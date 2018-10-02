<?php

namespace App\Http\Controllers\Sistema;

use App\Hospede;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HospedeController extends Controller
{
    public function mainHospede()
    {
        $registros = Hospede::all();
        return view('sistema.mainHospede',['Menu'=>'Hospede'], compact('registros'));
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
}
