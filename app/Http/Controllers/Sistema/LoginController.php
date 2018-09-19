<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function entrar(Request $req)
    {

        $dados = $req->all();

        if (Auth::attempt(['email' => $dados['email'], 'password' => $dados['senha']])) {

            return redirect()->route('sistema.home');

        } else {

            return redirect()
                ->route('login')
                ->with('message','Erro ao efetuar Login: Usuário e/ou senha incorreta');
        }
    }

    public function sair()
    {

        Auth::logout();
        return redirect()->route('login');

    }
}