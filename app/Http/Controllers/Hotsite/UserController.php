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
            'nome.min' => "O nome deve conter pelo menos 3 caracteres",
            'hotel.min' => "O Hotel deve conter pelo menos 3 caracteres",
            'password.min' => "A senha deve conter no minimo 6 caracteres",
            'telefone.numeric' => "No campo telefone, deverá conter apenas números",
            'telefone.required' => "O campo telefone, deve ser preenchido",
            'telefone.digits_between' => "O campo telefone, deve ter no mín 10 digitos e máx 15 digitos",
            'email.unique' => "Este e-mail já foi utilizado"
        ];

        $this->validate($req,
            [

                'nome' => 'required|min:3',
                'hotel' => 'required|min:3',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:5|max:25',
                'telefone' => 'required|numeric|digits_between:10,15'

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
