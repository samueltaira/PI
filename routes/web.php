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
    Route::group(['prefix' => 'core'], function () {
        Route::get('/quartos', ['as' => 'sistema.home', 'uses' => 'Sistema\HomeController@index']);
        Route::get('/listaQuartos', ['as' => 'sistema.lista.quartos', 'uses' => 'Sistema\HomeController@indexLista']);
        Route::get('/listaQuartos/search', ['as' => 'sistema.main.quartos.pesquisar', 'uses' => 'Sistema\HomeController@pesquisaQuarto']);
        Route::get('/cadastraQuarto', ['as' => 'sistema.main.cadastra.quarto', 'uses' => 'Sistema\HomeController@cadastrarQuarto']);
        Route::post('/cadastraQuarto/salvar', ['as' => 'sistema.main.quarto.salvar', 'uses' => 'Sistema\HomeController@salvarQuarto']);
        Route::get('/cadastraQuarto/inativar/{id}', ['as' => 'sistema.main.quarto.inativar', 'uses' => 'Sistema\HomeController@inativar']);
        Route::get('/cadastraQuarto/ativar/{id}', ['as' => 'sistema.main.quarto.ativar', 'uses' => 'Sistema\HomeController@ativar']);
        Route::get('/cadastraQuarto/editar/{id}', ['as' => 'sistema.main.quartos.editar', 'uses' => 'Sistema\HomeController@editarQuarto']);
        Route::post('/cadastraQuarto/atualiza/{id}', ['as' => 'sistema.main.quartos.atualizar', 'uses' => 'Sistema\HomeController@atualizarQuarto']);
    });
    Route::group(['prefix'=>'reserva'], function(){
        Route::get('/main', ['as'=>'core.reserva', 'uses'=> 'Sistema\ReservaController@mainReserva']);
        Route::get('/main/reserva', ['as'=>'core.nova.reserva', 'uses'=> 'Sistema\ReservaController@mainNovaReserva']);
        Route::post('/main/checkReserva', ['as'=>'core.check.reserva', 'uses'=> 'Sistema\ReservaController@checkReserva']);
        Route::post('/main/realizaReserva', ['as'=>'core.realiza.reserva', 'uses'=> 'Sistema\ReservaController@realizaReserva']);
        Route::get('/autocomplete', 'AutocompleteController@index');
        Route::post('/autocomplete/fetch', 'AutocompleteController@fetch')->name('autocomplete.fetch');
    });

    Route::group(['prefix' => 'hospede'], function () {
        Route::get('/cadastraHospede', ['as' => 'sistema.cadastra.hospedes', 'uses' => 'Sistema\HospedeController@cadastrarHospede']);
        Route::get('/mainHospede', ['as' => 'sistema.main.hospedes', 'uses' => 'Sistema\HospedeController@mainHospede']);
        Route::get('/mainHospede/search', ['as' => 'sistema.main.hospedes.pesquisar', 'uses' => 'Sistema\HospedeController@pesquisaHospede']);
        Route::get('/cadastraHospede/editar/{id}', ['as' => 'sistema.main.hospedes.editar', 'uses' => 'Sistema\HospedeController@editarHospede']);
        Route::post('/cadastraHospede/salvar', ['as' => 'sistema.main.hospedes.salvar', 'uses' => 'Sistema\HospedeController@salvarHospede']);
        Route::put('/cadastraHospede/atualizar/{id}', ['as' => 'sistema.main.hospedes.atualizar', 'uses' => 'Sistema\HospedeController@atualizarHospede']);
    });

    Route::group(['prefix' => 'perfil'], function () {
        Route::get('/l', ['as' => 'sistema.main.perfil', 'uses' => 'Sistema\PerfilController@index']);
        Route::post('/alterar', ['as' => 'sistema.main.altera.senha', 'uses' => 'Sistema\PerfilController@alteraSenha']);
        Route::get('/indexAlterar', ['as' => 'sistema.main.alterar.senha', 'uses' => 'Sistema\PerfilController@indexAlterarSenha']);

        Route::get('/lista', ['as' => 'sistema.main.lista.perfil', 'uses' => 'Sistema\PerfilController@listar'])->middleware(\App\Http\Middleware\isAdmin::class);
        Route::get('/cadastra', ['as' => 'sistema.main.cadastra.perfil', 'uses' => 'Sistema\PerfilController@cadastrar'])->middleware(\App\Http\Middleware\isAdmin::class);;
        Route::post('/salvar', ['as' => 'sistema.main.salva.perfil', 'uses' => 'Sistema\PerfilController@registrar'])->middleware(\App\Http\Middleware\isAdmin::class);
        Route::get('/deletar/{id}', ['as' => 'sistema.main.deleta.perfil', 'uses' => 'Sistema\PerfilController@deletar'])->middleware(\App\Http\Middleware\isAdmin::class);

    });
});


Route::get('/login', ['as' => 'login', 'uses' => 'Sistema\LoginController@index']);
Route::post('/login/entrar', ['as' => 'sistema.login.entrar', 'uses' => 'Sistema\LoginController@entrar']);
Route::get('/login/sair', ['as' => 'sistema.login.sair', 'uses' => 'Sistema\LoginController@sair']);
