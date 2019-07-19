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
Route::put('/bookings/update/{id}','API\BookingController@updateStatusPayment');
Route::delete('/booking/delete/{id}', 'API\BookingController@deleteBooking');
Route::get('/payments/report', 'API\PaymentController@reportPayment');


Route::get('location','API\LocationsController@getLocation');
Route::post('location','API\LocationsController@create');
// Route::get('/location/{idClient}','API\LocationsController@getLocationClient');
Route::get('/location/{emailClient}','API\LocationsController@getLocationClient');
Route::get('/locations/{city}','API\LocationsController@searchLocation');
Route::get('/location/delete/{idLocation}','API\LocationsController@deleteLocation');

Route::get('client','API\UsersController@getClient');
Route::get('/client/{email}','API\UsersController@getIdClient');
