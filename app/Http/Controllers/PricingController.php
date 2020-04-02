<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Enums\PricingPlan;

class PricingController extends Controller
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
     * Display a listing of available pricing plans.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = [];
        foreach (PricingPlan::getKeys() as $plan) {
            $plans[$plan] = PricingPlan::getValue($plan);
        }

        return response()->ok('Successfully fetched pricing', $plans);
    }
}
