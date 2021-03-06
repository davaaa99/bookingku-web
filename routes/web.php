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

Route::get('/', 'LandingPageController@index')->name('welcome');
Route::get('/verified/email', 'Auth\VerificationController@verifiedEmail');
Auth::routes(['verify' => true]);
Route::post('/login', 'Auth\LoginController@authenticate')->name('login');

/**
 * Router Group for authentication
 */
Route::group(['prefix' => '/v1/auth'], function () {
    Route::post('login', 'API\AuthController@login');
    Route::post('register', 'API\AuthController@registration');
    Route::get('logout', 'API\AuthController@logout')->name('clientlogout');
    Route::get('/register', 'ClientPageController@register')->name('clientregister');
});

/**
 * Router Group for
 */
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

/**
 * Router Group for client
 */
Route::group(['middleware' => ['auth', 'verified', 'is_client']], function () {

    /**
     * Route for view
     */
    Route::get('/locations', 'ClientPageController@locationList')->name('locationlist');
    Route::get('/location/detail/{id}', 'ClientPageController@locationDetail')->name('locationdetail');
    Route::get('/location/add', 'ClientPageController@locationAdd')->name('locationadd');
    Route::get('/location/edit/{id}', 'ClientPageController@locationEdit')->name('locationedit');
    
    Route::get('/bookinglist', 'ClientPageController@bookinglist')->name('bookinglist');
    Route::get('/addbooking', 'ClientPageController@addbooking')->name('addbooking');

    /**
     * Route for data
     */
    Route::get('data/kindoffield', 'API\REST\KindOfFieldController@index');

    Route::post('location', 'API\REST\LocationController@create');
    Route::get('data/locations', 'API\REST\LocationController@show');
    Route::post('data/location', 'API\REST\LocationController@locationDetail');
    Route::put('update/location', 'API\REST\LocationController@update');
    Route::delete('location/{id}', 'API\REST\LocationController@destroy');

    Route::post('uploadlokasi', 'API\REST\LocationController@storePhoto')->name('storePhoto');
    Route::post('update/photo', 'API\REST\LocationController@updatePhoto')->name('updatePhoto');

    Route::get('bookings/schedule/{id_schedule}','API\REST\ScheduleController@showById');
    Route::get('bookings/user/{email}','API\REST\UserController@getClientName');
    Route::post('bookings/field','API\REST\BookingController@showByField');
    Route::get('bookings/location/{id_location}/','API\REST\BookingController@showByLocation');
    Route::post('booking/manual','API\REST\BookingController@create');
    Route::put('/bookings/{id_booking}','API\REST\BookingController@update');
    Route::delete('/booking/{id_booking}', 'API\REST\BookingController@destroy');
    Route::get('bookings','API\REST\BookingController@showByCLient');
    Route::get('location','API\REST\LocationController@show');
    Route::get('field/data/{idLocation}','API\REST\FieldController@show');
});


/**
 * Router Group for admin
 */
Route::group(['middleware' => ['auth', 'verified', 'is_admin']], function () {
    Route::get('/verifybooking', 'AdminPageController@index')->name('admin');
    Route::get('/verifydetail/{id}', 'AdminPageController@verifyBookingDetail')->name('verifybookingdetail');
    Route::get('/clientlist', 'AdminPageController@clientList')->name('clientlist');
    Route::get('/clientlist/detaillokasi/{id}', 'AdminPageController@clientListDetailLokasi')->name('detaillokasi');
    Route::get('/clientlist/detaillokasi/detaillapang/{id}', 'AdminPageController@clientListDetailLapangan')->name('detaillapang');
    Route::get('/payment', 'AdminPageController@payment')->name('payment');
    Route::get('/clientlist/detaillokasi/detaillapang/', 'AdminPageController@payment')->name('payment');
    Route::get('/payment/paymentdetail/{id}', 'AdminPageController@paymentdetail')->name('paymentdetail');
});


Route::get('/menulapang', 'ClientPageController@menulapang')->name('lapang');
Route::get('/addlapang', 'ClientPageController@addLapang')->name('addlapang');
Route::get('/editlapang/{id}', 'ClientPageController@editLapang')->name('editlapang');
Route::get('/detaillapang/{id}', 'ClientPageController@detailLapang')->name('detaillapang');
Route::get('/schedule', 'ClientPageController@manageSchedule')->name('schedule');

Route::post('add', 'API\REST\FieldController@store');
Route::get('field/{id}','API\REST\FieldController@show');
Route::post('detail', 'API\REST\FieldController@detail')->name('edit');
Route::post('edit', 'API\REST\FieldController@edit')->name('edit');
Route::put('data/field', 'API\REST\FieldController@update');
Route::post('upload', 'API\REST\FieldController@upload')->name('upload');
Route::put('update', 'API\REST\FieldController@uploadedit')->name('updateedit');
Route::delete('delete/{id}', 'API\REST\FieldController@destroy')->name('delete');

