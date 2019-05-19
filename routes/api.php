<?php

use Illuminate\Http\Request;

//Autenticacao
Route::post('v1/auth', 'AuthenticateController@authJwt');

Route::group(['prefix' => 'v1/auth', 'middleware' => 'web'], function () {
    Route::get('/facebook', 'AuthenticateController@redirectToProvider');
    Route::get('/facebook/callback', 'AuthenticateController@handleProviderCallback');
});

//Monitoramento
Route::group(['prefix' => 'v1/monitoramento', 'middleware' => 'jwt.auth'], function () {
    Route::post('/', 'MonitoramentoController@store');
    Route::get('{id}', 'MonitoramentoController@show')->where('id', '[0-9]+');
    Route::get('/', 'MonitoramentoController@showAll');
    Route::put('{id}', 'MonitoramentoController@update');
    Route::delete('{id}', 'MonitoramentoController@delete');
});


//Usuarios
Route::post('v1/users', 'UserController@store');
Route::group(['prefix' => 'v1/users', 'middleware' => 'jwt.auth'], function () {
    Route::get('{id}', 'UserController@show');
    Route::get('/', 'UserController@showAll');
    Route::put('{id}', 'UserController@update');
    Route::put('password/{id}', 'UserController@updatePassword');
    Route::delete('{id}', 'UserController@delete');
});
Route::group(['prefix' => 'v1/users'], function () {
    Route::get('{email}', 'UserController@showUserIdByEmail');
});
Route::group(['prefix' => 'v1/userscpf'], function () {
    Route::get('{email}', 'UserController@showUserCPFByEmail');
});


//SendMail
Route::group(['prefix' => 'v1/sendmail', 'middleware' => 'jwt.auth'], function () {
    Route::post('/','SendMailController@sendMailApp');
});

//Recupera senha
Route::group(['prefix' => 'v1/sendmail'], function () {
    Route::post('/resetpassword','SendMailController@sendMailResetPassword');
});

