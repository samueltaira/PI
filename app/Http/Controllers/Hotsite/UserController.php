<?php

namespace App\Http\Controllers\Hotsite;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class UserController extends Controller
{
    public function registrar(Request $req)
    {

        $d = $req->all();

          $dados =[
            'nome' => $d['nome'],
            'hotel'=> $d['hotel'],
            'email'=> $d['email'],
            'password' => bcrypt($d['password']),
            'telefone'=> $d['telefone'],
            'quartos' => $d['quartos'],
            'admin' => $d['admin'],

        ];

        User::create($dados);

        return redirect()
            ->route('login')
            ->with('message_ok','Login cadastrado com sucesso');

    }

}
