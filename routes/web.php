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
    return view('hotsite.index');
});

Route::get ('/login', function(){
    return view('hotsite.login');
});

Route::get ('/politica', function(){
    return view('hotsite.politica');
});

Route::get ('/cadastro', function(){
    return view('hotsite.cadastro');
});

Route::get ('/core', function(){
    return view('sistema.core');
});
