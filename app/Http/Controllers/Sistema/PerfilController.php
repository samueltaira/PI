<?php
/**
 * Created by PhpStorm.
 * User: mukkz
 * Date: 03/10/18
 * Time: 22:25
 */

namespace App\Http\Controllers\Sistema;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class PerfilController extends Controller
{

    public function index()
    {
        return view('sistema.profile.mainProfile');
    }

    public function listar()
    {
        $hotel_id = auth()->user()->getHotelId();
        $atendentes = DB::table('users')
            ->where('hotel_id', '=', $hotel_id)
            ->where('admin', '=', 'não')
            ->orderBy('nome')
            ->paginate(10);;
        return view('sistema.profile.profile_lista', ['atendentes'=> $atendentes]);

    }

    public function deletar($id)
    {
        $usuario= User::find($id);
        $usuario->delete();

        return redirect()
            ->route('sistema.main.lista.perfil')
            ->with('message_delete', 'Usuário excluído com sucesso');
    }

    public function cadastrar()
    {
        return view('sistema.profile.cadastraAtendente');
    }

    public function registrar(Request $req)
    {
        $mensagens = [
            'nome.min' => "O nome deve conter pelo menos 3 caracteres",
            'password.min' => "A senha deve conter no minimo 6 caracteres",
            'telefone.numeric' => "No campo telefone, deverá conter apenas números",
            'telefone.required' => "O campo telefone, deve ser preenchido",
            'telefone.digits_between' => "O campo telefone, deve ter no mín 10 digitos e máx 15 digitos",
            'email.unique' => "Este e-mail já foi utilizado"
        ];

        $this->validate($req,
            [

                'nome' => 'required|min:3',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:5|max:25',
                'telefone' => 'required|numeric|digits_between:10,15'

            ], $mensagens);

        $d = $req->all();



        $dados = [
            'nome' => $d['nome'],
            'email' => $d['email'],
            'hotel_id' => $d['hotel_id'],
            'password' => bcrypt($d['password']),
            'telefone' => $d['telefone'],
            'quartos' => $d['quartos'],
            'admin' => $d['admin'],
        ];


        User::create($dados);

        return redirect()
            ->route('sistema.main.lista.perfil')
            ->with('message_ok', 'Atendente cadastrado com sucesso');

    }

    public function alteraSenha(Request $request)
    {

        $request->user()->fill([
            'password' => Hash::make($request->newPassword)
        ])->save();


        return redirect()->route('sistema.main.perfil')
            ->with('message_ok', 'Senha alterada com sucesso.');
    }

    public function indexAlterarSenha()
    {
        return view('sistema.profile.alteraSenha');
    }
}