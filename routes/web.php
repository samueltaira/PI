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

    Route::group(['prefix'=>'core'], function(){

        Route::get('/quartos', ['as' => 'sistema.home', 'uses' => 'Sistema\HomeController@index']);

    });

    Route::group(['prefix'=>'hospede'], function(){

        Route::get('/cadastraHospede', ['as' => 'sistema.cadastra.hospedes', 'uses' => 'Sistema\HospedeController@cadastrarHospede']);
        Route::get('/mainHospede', ['as' => 'sistema.main.hospedes', 'uses' => 'Sistema\HospedeController@mainHospede']);
        Route::get('/cadastraHospede/editar/{id}', ['as' => 'sistema.main.hospedes.editar', 'uses' => 'Sistema\HospedeController@editarHospede']);

    });

Route::post('/cadastraHospede/salvar', ['as' => 'sistema.main.hospedes.salvar', 'uses' => 'Sistema\HospedeController@salvarHospede']);
Route::put('/cadastraHospede/atualizar/{id}', ['as' => 'sistema.main.hospedes.atualizar', 'uses' => 'Sistema\HospedeController@atualizarHospede']);

Route::group(['prefix' => 'perfil'], function(){

    Route::get('/perfil', ['as' => 'sistema.main.perfil', 'uses' => 'Sistema\PerfilController@index']);


});

});


Route::get('/login', ['as' => 'login', 'uses' => 'Sistema\LoginController@index']);
Route::post('/login/entrar', ['as' => 'sistema.login.entrar', 'uses' => 'Sistema\LoginController@entrar']);
Route::get('/login/sair', ['as' => 'sistema.login.sair', 'uses' => 'Sistema\LoginController@sair']);
