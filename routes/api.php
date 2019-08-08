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

Route::group(['prefix' => '/v1/auth'], function () {
    Route::post('login', 'API\AuthController@login');
    Route::post('register', 'API\AuthController@registration');
    Route::get('logout', 'API\AuthController@logout');
});

/**
 * Router Group for mobile
 */
Route::group(['middleware' => ['auth:api', 'verified', 'is_user'], 'prefix' => 'v1'], function () {    
    Route::get('locations','API\REST\LocationController@index');
    Route::get('fields/{id_location}','API\REST\FieldController@show');
    Route::get('schedules/{id_field}','API\REST\ScheduleController@show');
    Route::post('booking','API\REST\BookingController@create');
    Route::get('bookings','API\REST\BookingController@showByUser');
    
});

/**
 * Router Group for web client
 */
Route::group(['middleware' => ['auth:api', 'verified', 'is_client'], 'prefix' => 'v1'], function () {    
    Route::get('location','API\REST\LocationController@show');
    Route::post('location','API\REST\LocationController@create');
    Route::put('location/{id_location}','API\REST\LocationController@update');
    Route::delete('location/{id_location}','API\REST\LocationController@destroy');

    Route::get('field/{id_location}','API\REST\FieldController@show');
    Route::post('field','API\REST\FieldController@create');
    Route::put('field/{id_field}','API\REST\FieldController@update');
    Route::delete('field/{id_field}','API\REST\FieldController@destroy');
    
    Route::get('schedule/{id_field}','API\REST\ScheduleController@show');
    Route::post('schedule','API\REST\ScheduleController@create');
    Route::delete('schedule/{id_schedule}','API\REST\ScheduleController@destroy');
    
    Route::post('bookings','API\REST\BookingController@showByField');
    Route::post('booking/manual','API\REST\BookingController@createBookingManual');
    Route::put('/booking/{id_booking}','API\REST\BookingController@update');
    Route::delete('/booking/{id_booking}', 'API\REST\BookingController@destroy');

    Route::put('client','API\REST\UserController@update');
});

/**
 * Router Group for web admin
 */
Route::group(['middleware' => ['auth:api', 'verified', 'is_admin'], 'prefix' => 'v1'], function () {    
    Route::get('clients','API\REST\UserController@getClient');
    Route::get('client/{name}','API\REST\UserController@searchClient');
    Route::delete('client/{id_client}','API\REST\UserController@destroy');

    Route::get('users','API\REST\UserController@getUser');
    Route::get('user/{name}','API\REST\UserController@searchUser');

<<<<<<< HEAD
    Route::get('locations/admin','API\REST\LocationController@index');
    Route::get('fields/admin/{id_location}','API\REST\FieldController@show');
    Route::post('bookings/admin','API\REST\BookingController@showByLocation');
    Route::put('/bookings/{id_booking}','API\REST\BookingController@update');
=======
    Route::get('locations','API\REST\LocationController@index');
    Route::get('fields/{id_location}','API\REST\FieldController@show');
    Route::get('bookings/{id_location}/{date}','API\REST\BookingController@showByLocation');
    Route::put('/booking/{id_booking}','API\REST\BookingController@update');
>>>>>>> origin/velia_merge-dev
    
    Route::get('kindoffield','API\REST\KindOfFieldController@index');
    Route::post('kindoffield','API\REST\KindOfFieldController@create');
    Route::put('kindoffield/{id_kind_of_field}','API\REST\KindOfFieldController@update');
    Route::delete('kindoffield/{id_kind_of_field}','API\REST\KindOfFieldController@destroy');

    Route::post('payment','API\REST\PaymentController@create');
    Route::put('payment/{id_payment}', 'API\REST\PaymentController@update');
    Route::delete('payment/{id_payment}', 'API\REST\PaymentController@destroy');
});
