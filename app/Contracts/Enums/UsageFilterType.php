<?php

namespace App\Contracts\Enums;

use Carbon\Carbon;
use BenSampo\Enum\Enum;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method static static Last24Hours()
 * @method static static Last30Days()
 * @method static static Last7Days()
 * @method static static Last1Month()
 * @method static static Last1Year()
 */
final class UsageFilterType extends Enum
{
    const Last24Hours = "LAST_24_HOURS";
    const Last30Days = "LAST_30_DAYS";
    const Last7Days = "LAST_7_DAYS";
    const Last1Year = "LAST_1_YEAR";
    const Custom = "CUSTOM";

    /**
     * Filter a model by a given date query type.
     *
     * @param Model $model
     * @param UsageFilterType $type
     * @param Carbon $options
     * @param Carbon $column
     * @return Builder
     */
    public static function filterByType(
        $model,
        $type,
        $from = null,
        $to = null,
        $column = 'updated_at'
    ): Builder {
        switch ($type) {
            case UsageFilterType::Last24Hours:
                return $model::whereDate($column, '>=', Carbon::now()->subHours(24));

            case UsageFilterType::Last30Days:
                return $model::whereDate($column, '>=', Carbon::now()->subDays(30));

            case UsageFilterType::Last7Days:
                return $model::whereDate($column, '>=', Carbon::now()->subDays(7));

            case UsageFilterType::Last1Year:
                return $model::whereDate($column, '>=', Carbon::now()->subYears(1));

            case UsageFilterType::Custom:
            default:
                $to = $to ?? Carbon::now();
                $from = $from ?? Carbon::now()->subHours(24);
                return $model::whereDate($column, '>=', $from)->whereDate($column, '<=', $to);
        }
    }
}
