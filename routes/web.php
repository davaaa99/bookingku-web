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
Route::get('/verifydetail','AdminPageController@verifydetail')->name('verifydetail');
Route::get('/client','AdminPageController@client')->name('client');
Route::get('/detaillokasi','AdminPageController@detaillokasi')->name('detaillokasi');
Route::get('/detaillapang','AdminPageController@detaillapang')->name('detaillapang');
Route::get('/payment','AdminPageController@payment')->name('payment');
Route::get('/paymentdetail','AdminPageController@paymentdetail')->name('paymentdetail');