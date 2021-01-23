<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('booking')->group(function () {
    Route::get('/', 'BookingController@index');
    Route::get('/customer/{customer_id}', 'BookingController@BookingStatusCustomer');
    Route::get('/pod/{customer_id}', 'BookingController@BookingPodCustomer');
    Route::get('/month/{customer_id}', 'BookingController@BookingMonthCustomer');
});

Route::prefix('booking_status')->group(function () {
    Route::get('/', 'BookingStatusController@index');
});

Route::prefix('pod')->group(function () {
    Route::get('/', 'PodController@index');
    Route::get('/{id}', 'PodController@show');
});

Route::prefix('customer')->group(function () {
    Route::get('/{id}', 'CustomerController@show');
});