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

    /**
     * Route for data
     */
    Route::post('location', 'API\REST\LocationController@create');
    Route::get('data/locations', 'API\REST\LocationController@show');
    Route::post('data/location', 'API\REST\LocationController@locationDetail');
    Route::put('update/location', 'API\REST\LocationController@update');
    Route::delete('location/{id}', 'API\REST\LocationController@destroy');
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
Route::get('/detaillapang', 'ClientPageController@detailLapang')->name('detaillapang');
Route::get('/schedule', 'ClientPageController@manageSchedule')->name('schedule');
Route::get('/bookinglist', 'AdminPageController@bookinglist')->name('bookinglist');
Route::get('/addbooking', 'AdminPageController@addbooking')->name('addbooking');
