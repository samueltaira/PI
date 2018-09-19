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


Auth::routes();

//Rota para politica
Route::get('/politica', function () {
    return view('hotsite.politica');
});

//Rotas para o hotsite
Route::get('/', ['as' => 'hotsite.home', 'uses' => 'Hotsite\HomeController@index']);
Route::get('/cadastro', ['as' => 'hotsite.cadastro', 'uses' => 'Hotsite\HomeController@cadastro']);

Route::post('/cadastro/registrar', ['as' => 'hotsite.cadastro.registrar', 'uses' => 'Hotsite\UserController@registrar']);

//grupo para restringir acesso ao sistema

Route::group(['middleware' => 'auth'], function () {

Route::get('/core', ['as' => 'sistema.home', 'uses' => 'Sistema\HomeController@index']);


});

//rotas para o sistema

//Route::get('/core', ['as' => 'sistema.home', 'uses' => 'Sistema\HomeController@index']);


Route::get('/login', ['as' => 'login', 'uses' => 'Sistema\LoginController@index']);
Route::post('/login/entrar', ['as' => 'sistema.login.entrar', 'uses' => 'Sistema\LoginController@entrar']);
Route::get('/login/sair', ['as' => 'sistema.login.sair', 'uses' => 'Sistema\LoginController@sair']);


Auth::routes();
