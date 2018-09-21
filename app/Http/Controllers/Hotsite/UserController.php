<?php

namespace App\Http\Controllers\Hotsite;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class UserController extends Controller
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function registrar(Request $req)
    {
        $mensagens = [
            'nome.min'           => "O nome deve conter pelo menos 3 caracteres",
            'hotel.min'          => "O Hotel deve conter pelo menos 3 caracteres",
            'password.min'       => "A senha deve conter no minimo 6 caracteres",
            'telefone.numeric'   => "No campo telefone, deverá conter apenas números",
            'telefone.required'  => "O campo telefone, deve ser preenchido",
            'telefone.min'       => "O campo telefone, deve ter no minimo 11 digitos",
            'quartos.required'   => "Deve-se preencher o campo com a quantidade de quartos",
            'quartos.numeric'    => "No campo quartos, deverá conter apenas números"
        ];


        $this->validate($req,
            [

                'nome'          => 'required|min:3',
                'hotel'         => 'required|min:3',
                'email'         => 'required|email',
                'password'      => 'required|min:5|max:25',
                'telefone'      => 'required|numeric|min:11',
                'quartos'       => 'required|numeric',

            ], $mensagens);

        $d = $req->all();

        $dados = [
            'nome' => $d['nome'],
            'hotel' => $d['hotel'],
            'email' => $d['email'],
            'password' => bcrypt($d['password']),
            'telefone' => $d['telefone'],
            'quartos' => $d['quartos'],
            'admin' => $d['admin'],
        ];

        User::create($dados);

        return redirect()
            ->route('login')
            ->with('message_ok', 'Login cadastrado com sucesso');

    }

}
