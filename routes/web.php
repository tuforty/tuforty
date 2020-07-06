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


Route::middleware(['verified'])->group(function () {
    /**
     * Dashboard
     */
    Route::get('/dashboard', 'DashboardController@index')->name('dashbord');

    /**
     * Dashboard > Management
     *
     * TODO: Bring this page to the dashboard controller method.
     */
    Route::get('/dashboard/management', 'DashboardController@management')->name('management');
});
