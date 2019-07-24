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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','AdminPageController@index')->name('index');
Route::get('/verifydetail/{id}','AdminPageController@verifyBookingDetail')->name('verifybookingdetail');
Route::get('/clientlist','AdminPageController@clientList')->name('clientlist');
Route::get('/clientlist/detaillokasi/{id}','AdminPageController@clientListDetailLokasi')->name('detaillokasi');
Route::get('/clientlist/detaillokasi/detaillapang/{id}','AdminPageController@clientListDetailLapangan')->name('detaillapang');
Route::get('/payment','AdminPageController@payment')->name('payment');
Route::get('/payment/paymentdetail/{id}','AdminPageController@paymentdetail')->name('paymentdetail');
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
