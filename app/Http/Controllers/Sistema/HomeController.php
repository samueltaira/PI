<?php

namespace App\Http\Controllers\Sistema;

use App\Quarto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class HomeController extends Controller
{
    public function index()
    {
        $hotel_id = auth()->user()->getHotelId();
        $quartos = DB::table('quartos')
            ->where('hotel_id', '=', $hotel_id)
            ->where('status_quarto', '=', 'Ativo' )
            ->orderBy('nomeQuarto')
            ->get();

        return view('sistema.quarto.mainQuarto', ['quartos' => $quartos]);
    }


    public function indexLista()
    {
//     Paginação OK com 10 hospedes por página - funcionando

        $hotel_id = auth()->user()->getHotelId();

        $quartos = DB::table('quartos')
            ->where('hotel_id', '=', $hotel_id)
            ->orderBy('id')
            ->paginate(10);

        return view('sistema.quarto.listaQuartos', ['quartos' => $quartos]);
    }

    public function pesquisaQuarto(Request $req)
    {
        $hotel_id = auth()->user()->getHotelId();
        $search = $req->get('valorPesquisado');

        $quartos = DB::table('quartos')
            ->where('nomeQuarto', 'like', '%' . $search . '%')
            ->where('hotel_id', '=', $hotel_id)
            ->orderBy('id')
            ->paginate(10);
        return view('sistema.quarto.listaQuartos', ['quartos' => $quartos]);
    }

    public function cadastrarQuarto()
    {
        return view('sistema.quarto.cadastraQuarto', ['Menu' => 'Core']);
    }

    public function salvarQuarto(Request $req)
    {
        $mensagens = [
            'nomeQuarto.required' => "Favor preencher o campo nome corretamente",
            'nomeQuarto.unique' => "Já existe um quarto registrado com este nome",
            'capacidade.required' => "Favor selecionar um tipo de quarto"
        ];


        $this->validate($req,
            [
                'capacidade' => 'required',
                'nomeQuarto' => [
                    'required',
                    Rule::unique('quartos')->where(function ($query) {
                        $query->where('hotel_id', auth()->user()->getHotelId());
                    })],
            ], $mensagens);


        $dados = $req->all();
        Quarto::create($dados);

        return redirect()->route('sistema.lista.quartos')
            ->with('message', 'Quarto cadastrado com sucesso.');

    }

    public function inativar($id)
    {
        $quarto = Quarto::find($id);
        $quarto->status_quarto='Inativo';
        $quarto->save();

        return redirect()
            ->route('sistema.lista.quartos')
            ->with('message_inative', 'Quarto inativado com sucesso');
    }
    public function ativar($id)
    {
        $quarto = Quarto::find($id);
        $quarto->status_quarto='Ativo';
        $quarto->save();

        return redirect()
            ->route('sistema.lista.quartos')
            ->with('message_active', 'Quarto Ativado com sucesso');
    }

    public function editarQuarto($id)
    {
        $registro = Quarto::find($id);

        return view('sistema.quarto.editaQuarto', compact('registro'));

    }

    public function atualizarQuarto(Request $req, $id)
    {
        $mensagens = [
            'nomeQuarto.required' => "Favor preencher o campo nome corretamente",
            'capacidade.required' => "Favor selecionar um tipo de quarto"
        ];

        $this->validate($req,
            [
                'capacidade' => 'required',
                'nomeQuarto' => 'required',
            ], $mensagens);

        $dados = $req->all();
        Quarto::find($id)->update($dados);

        return redirect()->route('sistema.lista.quartos')
            ->with('message5', 'Quarto atualizado com sucesso.');

    }
}
