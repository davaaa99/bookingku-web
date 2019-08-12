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

/**
 * Router Group for authentication
 */
Route::group(['prefix' => '/v1/auth'], function () {
    Route::post('login', 'API\AuthController@login');
    Route::post('register', 'API\AuthController@registration');
    Route::get('logout', 'API\AuthController@logout')->name('clientlogout');
});

Route::get('/clientregister','ClientPageController@register')->name('clientregister');
Route::get('/clientlogin','ClientPageController@login')->name('clientlogin');

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
    Route::get('/locationlist','ClientPageController@locationList')->name('locationlist');
    Route::get('/locationdetail','ClientPageController@locationDetail')->name('locationdetail');
    Route::get('/locationadd','ClientPageController@locationAdd')->name('locationadd');
    Route::get('/locationedit','ClientPageController@locationEdit')->name('locationedit');
});

/**
 * Router Group for admin
 */
Route::group(['middleware' => ['auth', 'verified', 'is_admin']], function () {
    Route::get('/verifybooking','AdminPageController@index')->name('admin');
    Route::get('/verifydetail/{id}','AdminPageController@verifyBookingDetail')->name('verifybookingdetail');
    Route::get('/clientlist','AdminPageController@clientList')->name('clientlist');
    Route::get('/clientlist/detaillokasi/{id}','AdminPageController@clientListDetailLokasi')->name('detaillokasi');
    Route::get('/clientlist/detaillokasi/detaillapang/{id}','AdminPageController@clientListDetailLapangan')->name('detaillapang');
    Route::get('/payment','AdminPageController@payment')->name('payment');
    Route::get('/payment/paymentdetail/{id}','AdminPageController@paymentdetail')->name('paymentdetail');
});
