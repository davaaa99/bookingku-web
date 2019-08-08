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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'LandingPageController@index')->name('welcome');
Route::get('/verified/email', 'Auth\VerificationController@verifiedEmail');
Auth::routes(['verify' => true]);

/** 
 * Router Group for
 */
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

});

/**
 * Firman
 * Admin Page
 */
$now = \Carbon\Carbon::now();
Route::group(['prefix' => '/$2y$10$MtKIr0/yICTGGEPWGcj0lOGLK9UlSd6hrOiBYgQWlfkym6V52hQSm'. (string) $now->day], function () {
    Route::get('/','AdminPageController@index')->name('admin');
    Route::get('/verifydetail/{id}','AdminPageController@verifyBookingDetail')->name('verifybookingdetail');
    Route::get('/clientlist','AdminPageController@clientList')->name('clientlist');
    Route::get('/clientlist/detaillokasi/{id}','AdminPageController@clientListDetailLokasi')->name('detaillokasi');
    Route::get('/clientlist/detaillokasi/detaillapang/{id}','AdminPageController@clientListDetailLapangan')->name('detaillapang');
    Route::get('/payment','AdminPageController@payment')->name('payment');
    Route::get('/clientlist/detaillokasi/detaillapang/','AdminPageController@payment')->name('payment');    
    Route::get('/payment/paymentdetail/{id}','AdminPageController@paymentdetail')->name('paymentdetail');
    Route::get('/menulapang','ClientPageController@menulapang')->name('lapang');
    Route::get('/addlapang','ClientPageController@addLapang')->name('addlapang');
    Route::get('/editlapang','ClientPageController@editLapang')->name('editlapang');
    Route::get('/detaillapang','ClientPageController@detailLapang')->name('detaillapang');


});

/**
 * Router Group for Client Page
 */
Route::group(['prefix' => '/$2y$10$MtKIr0/yICTGGEPWGcj0lOGLK9UlSd6hrOiBYgQWlfkym6V52hQSm'. (string) $now->day], function () {
    Route::get('/locationlist','ClientPageController@locationList')->name('locationlist');
    Route::get('/locationdetail','ClientPageController@locationDetail')->name('locationdetail');
    Route::get('/locationadd','ClientPageController@locationAdd')->name('locationadd');
    Route::get('/locationedit','ClientPageController@locationEdit')->name('locationedit');

    Route::get('/register','ClientPageController@register')->name('clientregister');
    Route::get('/login','ClientPageController@login')->name('clientlogin');
    Route::get('/schedule','ClientPageController@manageSchedule')->name('schedule');
    
});
