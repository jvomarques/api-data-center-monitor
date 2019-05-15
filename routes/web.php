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

Route::get('api/v1', function () {
    return 'API';
});

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'v1/auth', 'middleware' => 'web'], function () {
    Route::get('/facebook', 'AuthenticateController@redirectToProvider');
    Route::get('/facebook/callback', 'AuthenticateController@handleProviderCallback');
});

//SendMail
 //Route::get('/email','SendMailController@sendMailApp');