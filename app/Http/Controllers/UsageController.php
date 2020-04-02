<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Usage;
use App\Contracts\Enums\UsageFilterType;
use App\Http\Requests\Usage\IndexUsageRequest;

class UsageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:passport');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexUsageRequest $request)
    {
        // usage?type=TRANSLATE_MONEY_TO_WORDS&filter_type=LAST_24_HOURS
        $user = $request->user();
        $filterType = $request->query('filter_type', UsageFilterType::Last24Hours());

        [$from, $to] = [$request->query('from'), $request->query('to')];
        $from = $from ? Carbon::createFromFormat('d-m-Y', $from) : null;
        $to = $to ? Carbon::createFromFormat('d-m-Y', $from) : null;

        $usage = static::getUsage($user, $from, $to, $filterType);
        $message = "Usage for {$filterType} retrieved successfully.";
        return response()->ok($message, $usage);
    }

    /**
     * Fetch usage by quering using pre-defined date filter types.
     *
     * @param User $user
     * @param array|Carbon $from
     * @param array|Carbon $to
     * @param string $filterType
     * 
     * @return array
     */
    private static function getUsage(User $user, $from, $to, string $filterType)
    {
        [$metricColumn, $dateColumn] = ['quota_used', 'updated_at'];
        $filterType = UsageFilterType::filterByType(Usage::class, $filterType, $from, $to);

        $usage = $filterType->where('user_id', $user->id)
            ->get()
            ->groupBy(function ($item) use ($dateColumn) {
                return $item[$dateColumn]->format('d-m-Y');
            });

        return static::squashTrendsForDate($usage, $metricColumn, $dateColumn);
    }

    /**
     * Merge multiple records that might exist for a particular date
     * by simply summing up all of the values to be used for aggregation.
     *
     * @param Collection $usages
     * @param string $fieldToSumUp
     * @param string $dateColumn
     * @return array
     */
    private static function squashTrendsForDate($usage, $fieldToSumUp, $dateColumn = 'updated_at')
    {
        return $usage->transform(
            function ($values, $date) use ($fieldToSumUp, $dateColumn) {
                $$fieldToSumUp = $values->sum($fieldToSumUp);
                return array_merge(compact($dateColumn, $fieldToSumUp));
            }
        );
    }
}
