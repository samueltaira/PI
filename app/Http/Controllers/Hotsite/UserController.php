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
            'password.min'       => "A senha deve conter no minimo 5 caracteres",
            'telefone.numeric'   => "No campo telefone, deverá conter apenas números",
            'quartos.required'   => "Deve-se preencher o campo com a quantidade de quartos"
        ];


        $this->validate($req,
            [

                'nome'          => 'required|min:3',
                'hotel'         => 'required|min:3',
                'email'         => 'required|email',
                'password'      => 'required|min:5|max:25',
                'telefone'      => 'required|numeric',
                'quartos'       => 'required',

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
