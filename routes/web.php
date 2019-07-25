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

<<<<<<< HEAD
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
=======
Route::get('/', 'LandingPageController@index')->name('welcome');
Route::get('/verified/email', 'Auth\VerificationController@verifiedEmail');
Auth::routes(['verify' => true]);

/**
 * Router Group for
 */
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

});
>>>>>>> e5f22d6cbdb7ef337d83dcec267fd48346ac8437
