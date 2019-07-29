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
    
    
});

/**
 * Router Group for web client
 */
Route::group(['middleware' => ['auth:api', 'verified', 'is_client'], 'prefix' => 'v1'], function () {    
    Route::post('booking/{id_schedule}','API\REST\BookingController@create');
    Route::get('booking','API\REST\BookingController@showByEmail');
    Route::put('/booking/{id_booking}','API\REST\BookingController@update');
    Route::delete('/booking/{id_booking}', 'API\REST\BookingController@destroy');
    Route::get('booking/{id_location}','API\REST\BookingController@showByDate');

    Route::get('location','API\REST\LocationController@show');
    Route::post('location','API\REST\LocationController@create');
    Route::put('location/{id_location}','API\REST\LocationController@update');
    Route::delete('location/{id_location}','API\REST\LocationController@destroy');

    Route::get('field/{id_location}','API\REST\FieldController@show');
    Route::post('field/{id_location}/{id_kind}','API\REST\FieldController@create');
    Route::put('field/{id_field}','API\REST\FieldController@update');
    Route::delete('field/{id_field}','API\REST\FieldController@destroy');
    
    Route::get('schedule/{id_field}','API\REST\ScheduleController@index');
    Route::post('schedule/{id_field}','API\REST\ScheduleController@create');

    Route::put('client','API\REST\UserController@update');
});

/**
 * Router Group for web admin
 */
Route::group(['middleware' => ['auth:api', 'verified', 'is_admin'], 'prefix' => 'v1'], function () {    
    Route::get('locations','API\REST\LocationController@index');
    Route::get('clients','API\REST\UserController@getClient');
    Route::get('client/{name}','API\REST\UserController@searchClient');
    Route::delete('client/{id_client}','API\REST\UserController@destroy');

    Route::get('users','API\REST\UserController@getUser');
    Route::get('user/{name}','API\REST\UserController@searchUser');
    
    Route::put('payment', 'API\REST\PaymentController@store');
});

Route::get('bookings','API\REST\BookingController@index');






Route::put('/payments/update/{id}','API\REST\PaymentController@update');
Route::delete('/payments/delete/{id}','API\REST\PaymentController@destroy');
Route::get('schedule','API\SchedulesController@index');
Route::post('createschedule','API\SchedulesController@createSchedules');
Route::get('/schedules/{id_field}','API\SchedulesController@getSchedule');
