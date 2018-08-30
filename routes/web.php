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
    return view('index');
});

Route::get ('/login', function(){
    return view('login');
});

Route::get ('/politica', function(){
    return view('politica');
});

Route::get ('/core', function(){
    return view('core');
});

Route::get ('/cadastro', function(){
    return view('cadastro');
});