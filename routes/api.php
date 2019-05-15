<?php

use Illuminate\Http\Request;

//Autenticacao
Route::post('v1/auth', 'AuthenticateController@authJwt');

Route::group(['prefix' => 'v1/auth', 'middleware' => 'web'], function () {
    Route::get('/facebook', 'AuthenticateController@redirectToProvider');
    Route::get('/facebook/callback', 'AuthenticateController@handleProviderCallback');
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


//Servicos
Route::group(['prefix' => 'v1/cidades', 'middleware' => 'jwt.auth'], function () {
    Route::get('{id}', 'CidadesController@show')->where('id', '[0-9]+');
    Route::get('/', 'CidadesController@showAll');
    Route::put('{id}', 'CidadesController@update');
    Route::delete('{id}', 'CidadesController@delete');
});

//Bairros
Route::group(['prefix' => 'v1/bairros', 'middleware' => 'jwt.auth'], function () {
    Route::get('{id}', 'BairrosController@show')->where('id', '[0-9]+');
    Route::get('/', 'BairrosController@showAll');
    Route::put('{id}', 'BairrosController@update');
    Route::delete('{id}', 'BairrosController@delete');
});

//Cores
Route::group(['prefix' => 'v1/cores', 'middleware' => 'jwt.auth'], function () {
    Route::get('{id}', 'CoresController@show')->where('id', '[0-9]+');
    Route::get('/', 'CoresController@showAll');
    Route::put('{id}', 'CoresController@update');
    Route::delete('{id}', 'CoresController@delete');
});

//Marcas
Route::group(['prefix' => 'v1/marcas', 'middleware' => 'jwt.auth'], function () {
    Route::get('{id}', 'MarcasController@show')->where('id', '[0-9]+');
    Route::get('/', 'MarcasController@showAll');
    Route::put('{id}', 'MarcasController@update');
    Route::delete('{id}', 'MarcasController@delete');
});

//Modelos
Route::group(['prefix' => 'v1/modelos', 'middleware' => 'jwt.auth'], function () {
    Route::get('{id}', 'ModelosController@show')->where('id', '[0-9]+');
    Route::get('/', 'ModelosController@showAll');
    Route::put('{id}', 'ModelosController@update');
    Route::delete('{id}', 'ModelosController@delete');
});

//Veiculos
Route::group(['prefix' => 'v1/veiculos', 'middleware' => 'jwt.auth'], function () {
    Route::post('/', 'VeiculosController@store');
    Route::get('{id}', 'VeiculosController@show')->where('id', '[0-9]+');
    Route::get('user/{user_id}', 'VeiculosController@showUserId')->where('user_id', '[0-9]+');
    Route::get('/', 'VeiculosController@showAll');
    Route::put('{id}', 'VeiculosController@update');
    Route::delete('{id}', 'VeiculosController@delete');
});

//Montadoras
Route::group(['prefix' => 'v1/montadoras', 'middleware' => 'jwt.auth'], function () {
    Route::get('{id}', 'MontadorasController@show')->where('id', '[0-9]+');
    Route::get('/', 'MontadorasController@showAll');
    Route::put('{id}', 'MontadorasController@update');
    Route::delete('{id}', 'MontadorasController@delete');
});

//Oficinas
Route::group(['prefix' => 'v1/oficinas', 'middleware' => 'jwt.auth'], function () {
    Route::get('{id}', 'OficinasController@show')->where('id', '[0-9]+');
    Route::get('/', 'OficinasController@showAll');
    Route::put('{id}', 'OficinasController@update');
    Route::delete('{id}', 'OficinasController@delete');
});

//Categorias
Route::group(['prefix' => 'v1/categorias', 'middleware' => 'jwt.auth'], function () {
    Route::get('{id}', 'CategoriasController@show')->where('id', '[0-9]+');
    Route::get('/', 'CategoriasController@showAll');
    Route::put('{id}', 'CategoriasController@update');
    Route::delete('{id}', 'CategoriasController@delete');
});

//Servicos
Route::group(['prefix' => 'v1/servicos', 'middleware' => 'jwt.auth'], function () {
    Route::get('{id}', 'ServicosController@show')->where('id', '[0-9]+');
    Route::get('/', 'ServicosController@showAll');
    Route::put('{id}', 'ServicosController@update');
    Route::delete('{id}', 'ServicosController@delete');
});

//Comissoes
Route::group(['prefix' => 'v1/comissoes', 'middleware' => 'jwt.auth'], function () {
    Route::get('{id}', 'ComissoesController@show')->where('id', '[0-9]+');
    Route::get('/', 'ComissoesController@showAll');
    Route::put('{id}', 'ComissoesController@update');
    Route::delete('{id}', 'ComissoesController@delete');
});

//Situações
Route::group(['prefix' => 'v1/situacoes', 'middleware' => 'jwt.auth'], function () {
    Route::get('{id}', 'SituacoesController@show')->where('id', '[0-9]+');
    Route::get('/', 'SituacoesController@showAll');
    Route::put('{id}', 'SituacoesController@update');
    Route::delete('{id}', 'SituacoesController@delete');
});

//Avaliações
Route::group(['prefix' => 'v1/avaliacoes', 'middleware' => 'jwt.auth'], function () {
    Route::get('{id}', 'AvaliacoesController@show')->where('id', '[0-9]+');
    Route::get('/', 'AvaliacoesController@showAll');
    Route::put('{id}', 'AvaliacoesController@update');
    Route::delete('{id}', 'AvaliacoesController@delete');
});

//Atendimentos
Route::group(['prefix' => 'v1/atendimentos', 'middleware' => 'jwt.auth'], function () {
    Route::post('/', 'AtendimentosController@store');
    Route::get('{id}', 'AtendimentosController@show')->where('id', '[0-9]+');
    Route::get('user/{user_id}', 'AtendimentosController@showUserId')->where('user_id', '[0-9]+');
    Route::get('/', 'AtendimentosController@showAll');
    Route::put('{id}', 'AtendimentosController@update');
    Route::delete('{id}', 'AtendimentosController@delete');
});

//AtendimentosServicos
Route::group(['prefix' => 'v1/atendimentosservicos', 'middleware' => 'jwt.auth'], function () {
    Route::post('/', 'AtendimentosServicosController@store');
    Route::get('{id}', 'AtendimentosServicosController@show')->where('id', '[0-9]+');
    Route::get('atendimentos/{atendimento_id}','AtendimentosServicosController@showAtendimentosId')->where('atendimento_id', '[0-9]+');
    Route::get('/', 'AtendimentosServicosController@showAll');
    Route::put('{id}', 'AtendimentosServicosController@update');
    Route::delete('{id}', 'AtendimentosServicosController@delete');
});

//AtendimentosOficinas
Route::group(['prefix' => 'v1/atendimentosoficinas', 'middleware' => 'jwt.auth'], function () {
    Route::post('/', 'AtendimentosOficinasController@store');
    Route::get('{id}', 'AtendimentosOficinasController@show')->where('id', '[0-9]+');
    Route::get('/', 'AtendimentosOficinasController@showAll');
    Route::put('{id}', 'AtendimentosOficinasController@update');
    Route::delete('{id}', 'AtendimentosOficinasController@delete');
});

//OficinasServicos
Route::group(['prefix' => 'v1/oficinasservicos', 'middleware' => 'jwt.auth'], function () {
    Route::get('{id}', 'OficinasServicosController@show')->where('id', '[0-9]+');
    Route::get('/', 'OficinasServicosController@showAll');
    Route::put('{id}', 'OficinasServicosController@update');
    Route::delete('{id}', 'OficinasServicosController@delete');
});

//OficinasMontadoras
Route::group(['prefix' => 'v1/oficinasmontadoras', 'middleware' => 'jwt.auth'], function () {
    Route::get('{id}', 'OficinasMontadorasController@show')->where('id', '[0-9]+');
    Route::get('/', 'OficinasMontadorasController@showAll');
    Route::put('{id}', 'OficinasMontadorasController@update');
    Route::delete('{id}', 'OficinasMontadorasController@delete');
});

//UserOnesignal
Route::post('v1/useronesignal', 'UserOnesignalController@store');
Route::put('v1/useronesignal/{user_id}', 'UserOnesignalController@update');
Route::group(['prefix' => 'v1/useronesignal', 'middleware' => 'jwt.auth'], function () {
    Route::get('{user_id}', 'UserOnesignalController@show')->where('user_id', '[0-9]+');
    Route::get('/', 'UserOnesignalController@showAll');
    Route::put('{user_id}', 'UserOnesignalController@update');
    //Route::put('{id}', 'UserOnesignalController@update');
    Route::delete('{user_id}', 'UserOnesignalController@delete');
});

//SendMail
Route::group(['prefix' => 'v1/sendmail', 'middleware' => 'jwt.auth'], function () {
    Route::post('/','SendMailController@sendMailApp');
});

//Recupera senha
Route::group(['prefix' => 'v1/sendmail'], function () {
    Route::post('/resetpassword','SendMailController@sendMailResetPassword');
});

