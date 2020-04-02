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
 * Authentication / TOken Generation.
 */
Route::get('token', 'ApiTokenController@get');
Route::get('token/refresh', 'ApiTokenController@refresh');

/**
 * Pricing API
 */
Route::get('pricing', 'PricingController@index')->middleware('auth:passport');

/**
 * Billing API
 */
Route::post('billing/purchase', 'BillingController@purchaseQuota')->middleware('auth:passport');

/**
 * Usage Analytics
 */
Route::get('usage/analytics', 'UsageController@index');

/**
 * Translation API 
 */
Route::get('translator/money', 'MoneyTranslateController@get');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
