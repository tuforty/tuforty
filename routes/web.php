<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Landing Page
 */
Route::view('/', 'welcome');

/**
 * Authentication
 */
Auth::routes(['verify' => true]);

// Route::group
/**
 * Dashboard
 */
Route::get('/dashboard', 'DashboardController@index')->name('dashbord');

/**
 * Dashboard > Billing
 * 
 * TODO: Bring this page to the dashboard controller method.
 */
Route::get('/dashboard/billing', 'DashboardController@billing')->name('billing');

/**
 * Dashboard > Usage
 */
Route::get('/dashboard/usage', 'DashboardController@usage')->name('usage');
