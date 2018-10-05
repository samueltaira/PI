<?php

namespace App\Http\Controllers\Sistema;

use App\User;
use App\Hospede;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;

class HospedeController extends Controller
{
    public function mainHospede()
    {
//     Paginação OK com 30 hospedes por página - funcionando

        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('sistema.mainHospede')->with('hospedes', $user->hospedes()->paginate(30));
    }

    public function cadastrarHospede()
    {
        return view('sistema.cadastraHospede', ['Menu' => 'Hospede']);
    }

    public function salvarHospede(Request $req)
    {
        $mensagens = [
            'nome.min' => "O nome deve conter pelo menos 3 caracteres",
            'nome.required' => "Favor preencher o campo nome corretamente",
            'cidade.min' => "A cidade deve conter pelo menos 3 caracteres",
            'cidade.required' => "Favor preencher o campo cidade corretamente",
            'email.email' => "O email deve ser preenchido corretamente",
            'email.required' => "Favor preencher o campo de email",
            'contato.numeric' => "No campo telefone, deverá conter apenas números",
            'contato.required' => "O campo telefone, deve ser preenchido",
            'contato.digits_between' => "O campo telefone, deve conter entre 10 e 15 digitos",
            'documento.required' => "Favor preencher o campo documento",
            'documento.numeric' => "Favor preencher o campo documento, somente com números",
            'documento.digits_between' => "O campo documento deve conter entre 11 e 15 dígitos",
            'dataNascimento.before' => "O hóspede cadastrado deve ser maior de 18 anos",
            'dataNascimento.required' => "Favor preencher o campo de data nascimento!",
            'dataNascimento.date_format' => "Favor preencher o campo de data de nascimento de maneira correta (Dia-Mês-Ano)"
        ];

        $this->validate($req,
            [

                'nome' => 'required|min:3',
                'cidade' => 'required|min:3',
                'email' => 'required|email',
                'contato' => 'required|numeric|digits_between:10,15',
                'documento' => 'required|numeric|digits_between:11,15',
                'dataNascimento' => 'required|before:-18 years' . date('Y-m-d') . '|date_format:Y-m-d'

            ], $mensagens);


        $dados = $req->all();
        Hospede::create($dados);

        return redirect()->route('sistema.main.hospedes')
            ->with('message', 'Hóspede cadastrado com sucesso.');

    }

    public function editarHospede($id)
    {
        $registro = Hospede::find($id);

        return view('sistema.editaHospede', compact('registro'));

    }

    public function atualizarHospede(Request $req, $id)
    {
        $mensagens = [
            'nome.min' => "O nome deve conter pelo menos 3 caracteres",
            'nome.required' => "Favor preencher o campo nome corretamente",
            'cidade.min' => "A cidade deve conter pelo menos 3 caracteres",
            'cidade.required' => "Favor preencher o campo cidade corretamente",
            'email.email' => "O email deve ser preenchido corretamente",
            'email.required' => "Favor preencher o campo de email",
            'contato.numeric' => "No campo telefone, deverá conter apenas números",
            'contato.required' => "O campo telefone, deve ser preenchido",
            'contato.digits_between' => "O campo telefone, deve conter entre 10 e 15 digitos",
            'documento.required' => "Favor preencher o campo documento",
            'documento.numeric' => "Favor preencher o campo documento, somente com números",
            'documento.digits_between' => "O campo documento deve conter entre 11 e 15 dígitos",
            'dataNascimento.before' => "O hóspede cadastrado deve ser maior de 18 anos",
            'dataNascimento.required' => "Favor preencher o campo de data nascimento!",
            'dataNascimento.date_format' => "Favor preencher o campo de data de nascimento de maneira correta (Dia-Mês-Ano)"
        ];

        $this->validate($req,
            [

                'nome' => 'required|min:3',
                'cidade' => 'required|min:3',
                'email' => 'required|email',
                'contato' => 'required|numeric|digits_between:10,15',
                'documento' => 'required|numeric|digits_between:11,15',
                'dataNascimento' => 'required|before:-18 years' . date('Y-m-d') . '|date_format:Y-m-d'

            ], $mensagens);

        $dados = $req->all();
        Hospede::find($id)->update($dados);

        return redirect()->route('sistema.main.hospedes')
            ->with('message1', 'Hóspede atualizado com sucesso.');

    }


}
