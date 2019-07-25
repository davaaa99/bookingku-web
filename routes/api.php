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
});

/**
 * Router Group for web admin
 */
Route::group(['middleware' => ['auth:api', 'verified', 'is_admin'], 'prefix' => 'v1'], function () {    
    Route::get('locations','API\REST\LocationController@index');
    
});

Route::get('schedule','API\SchedulesController@index');
Route::post('createschedule','API\SchedulesController@createSchedules');
Route::get('/schedules/{id_field}','API\SchedulesController@getSchedule');
