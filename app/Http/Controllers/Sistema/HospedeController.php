<?php

namespace App\Http\Controllers\Sistema;

use App\User;
use App\Hospede;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HospedeController extends Controller
{
    public function mainHospede()
    {

        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('sistema.mainHospede')->with('hospedes', $user->hospedes);


//        $registros = Hospede::all();

//        return view('sistema.mainHospede',['Menu'=>'Hospede'], compact('registros'));

    }

    public function cadastrarHospede()
    {
        return view('sistema.cadastraHospede', ['Menu'=>'Hospede']);
    }

    public function salvarHospede(Request $req)
    {
        $dados = $req->all();
        Hospede::create($dados);

        return redirect()->route('sistema.main.hospedes')
                         ->with('message','Hóspede cadastrado com sucesso.');

    }

    public function editarHospede($id)
    {
        $registro = Hospede::find($id);

        return view('sistema.editaHospede', compact('registro'));

    }

    public function atualizarHospede(Request $req, $id)
    {
        $dados = $req->all();
        Hospede::find($id)->update($dados);

        return redirect()->route('sistema.main.hospedes')
            ->with('message1','Hóspede atualizado com sucesso.');

    }




}
