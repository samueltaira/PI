<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('hotsite.login');
    }

    public function entrar(Request $req)
    {

        $dados = $req -> all();

        if(Auth::attempt(['email'=> $dados['email'], 'password' => $dados['senha']])){

        redirect()->route('sistema.home');

    }

        redirect()->route('sistema.login');

    }

    public function sair()
    {

        Auth::logout();
        redirect()->route('hotsite.home');

    }
}