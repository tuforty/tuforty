<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/**
 * Pricing API
 */
Route::get('pricing', 'PricingController@index')->middleware('auth:passport');

/**
 * Billing API
 */
Route::post('billing/purchase', 'BillingController@purchaseQuota')->middleware('auth:passport');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
