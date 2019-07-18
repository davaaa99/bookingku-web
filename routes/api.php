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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('location','API\LocationsController@getLocation');
Route::post('location','API\LocationsController@create');
// Route::get('/location/{idClient}','API\LocationsController@getLocationClient');
Route::get('/location/{emailClient}','API\LocationsController@getLocationClient');
Route::get('/locations/{city}','API\LocationsController@searchLocation');
Route::delete('/location/delete/{idLocation}','API\LocationsController@deleteLocation');

Route::get('client','API\UsersController@getClient');
Route::get('/client/{email}','API\UsersController@getIdClient');
Route::delete('/client/delete/{email}','API\UsersController@deleteClient');
