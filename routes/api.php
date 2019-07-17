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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('bookings','API\BookingController@getBooking');
Route::post('bookings/add','API\BookingController@createBooking');
Route::get('bookings/client/{email}','API\BookingController@getBookingByEmail');
Route::get('bookings/admin/{location}&{date}','API\BookingController@getBookingByDate');
