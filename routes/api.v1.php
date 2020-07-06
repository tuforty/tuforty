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
Route::get('pricing', 'PricingController@index');

/**
 * Billing API
 */
Route::post('billing/purchase', 'BillingController@purchaseQuota');

/**
 * Billing API
 */
Route::get('billing/current-plan', 'BillingController@currentPlan');

/**
 * Usage Analytics
 */
Route::get('usage/analytics', 'UsageController@index');

/**
 * Translation API 
 */
Route::get('translator/money', 'MoneyTranslateController@get');
