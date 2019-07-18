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

<<<<<<< HEAD

Route::get('field','FieldController@index');
Route::post('field/add','FieldController@create');
Route::get('field/show','FieldController@show');
Route::get('field/getfieldlocation/{id_location}','FieldController@getLapangLocation');
// Route::get('field/getfieldid/{id_location}','FieldController@getIdField');
=======
Route::get('location','API\LocationsController@getLocation');
Route::post('location','API\LocationsController@create');
// Route::get('/location/{idClient}','API\LocationsController@getLocationClient');
Route::get('/location/{emailClient}','API\LocationsController@getLocationClient');
Route::get('/locations/{city}','API\LocationsController@searchLocation');
Route::get('/location/delete/{idLocation}','API\LocationsController@deleteLocation');

Route::get('client','API\UsersController@getClient');
Route::get('/client/{email}','API\UsersController@getIdClient');
>>>>>>> a296996a50d9fe460502867e8163a1a236a40f85
