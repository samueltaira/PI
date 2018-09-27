<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HospedeController extends Controller
{
    public function mainHospede()
    {
        return view('sistema.mainHospede');
    }

    public function cadastrarHospede()
    {
        return view('sistema.cadastraHospede');
    }

    public function salvarHospede(Request $req)
    {
        $dados = $req->all();
        Hospede::create($dados);

        //return redirect()->routes(''vai.p.pqp);
    }
}
