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
Route::group(['middleware' => ['auth:api', 'verified'], 'prefix' => 'v1'], function () {    
    Route::get('bookings','API\BookingController@getBooking');
    
});

/**
 * Router Group for web
 */
Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'v1'], function () {    
    
    
});

// Route::get('bookings','API\BookingController@getBooking');
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
Route::delete('/location/delete/{idLocation}','API\LocationsController@deleteLocation');

Route::get('field','FieldController@index');
Route::post('field/add','FieldController@create');
Route::get('field/show','FieldController@show');
Route::get('field/getfieldlocation/{id_location}','FieldController@getLapangLocation');
Route::delete('/field/delete/{id_field}','FieldController@deleteField'); 

// // Route::get('field/getfieldid/{id_location}','FieldController@getIdField');
// Route::get('location','API\LocationsController@getLocation');
// Route::post('location','API\LocationsController@create');
// // Route::get('/location/{idClient}','API\LocationsController@getLocationClient');
// Route::get('/location/{emailClient}','API\LocationsController@getLocationClient');
// Route::get('/locations/{city}','API\LocationsController@searchLocation');
// Route::delete('/location/delete/{idLocation}','API\LocationsController@deleteLocation');

// Route::get('client','API\UsersController@getClient');
// Route::get('/client/{email}','API\UsersController@getIdClient');
// Route::delete('/client/delete/{email}','API\UsersController@deleteClient');
//Route untuk admin
Route::get('admin','API\UsersController@getAdmin');
Route::get('/admin/search/{name}','API\UsersController@searchAdmin');
Route::put('/admin/update/{idAdmin}','API\UsersController@updateAdmin');
Route::delete('/admin/delete/{email}','API\UsersController@deleteAdmin');

//Route untuk client
Route::get('client','API\UsersController@getClient');
Route::get('/client/search/{name}','API\UsersController@searchClient');
Route::delete('/client/delete/{email}','API\UsersController@deleteClient');

//Route untuk user
Route::post('user/register','API\UsersController@createUser');
// Route::get('user','API\UsersController@getUser');
Route::get('user/search/{name}','API\UsersController@searchUser');
Route::delete('/user/delete/{email}','API\UsersController@deleteUser');

Route::get('all','API\UsersController@getAllUser');

Route::get('all/{name}','API\UsersController@searchAllUser');

Route::get('schedule','API\SchedulesController@index');
Route::get('createschedule','API\SchedulesController@createSchedule');