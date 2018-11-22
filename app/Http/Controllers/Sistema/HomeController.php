<?php

namespace App\Http\Controllers\Sistema;

use App\Reserva;
use App\Quarto;
use App\Hospede;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class HomeController extends Controller
{
    public function index()
    {
        $hotel_id = auth()->user()->getHotelId();
        $tudo = Reserva::with(['hospede', 'quarto'])
            ->where([['reservas.hotel_id', $hotel_id],
                    ['reservas.status', '<>' ,'Cancelado'],
                    ['reservas.status', '<>', 'Fechada'],
                    ['reservas.inicioReserva', '=', Carbon::now()]
                ])
            ->get();

        $checkin = Reserva::with(['hospede', 'quarto'])
            ->where([['reservas.hotel_id', $hotel_id],
                ['reservas.status', '=' ,'aberto'],
                ['reservas.inicioReserva', '=', Carbon::now()]
            ])
            ->get();

        $checkout = Reserva::with(['hospede', 'quarto'])
            ->where([['reservas.hotel_id', $hotel_id],
                ['reservas.status', '=' ,'Iniciada'],
                ['reservas.fimReserva', '=', Carbon::now()]
            ])
            ->get();

        return view('sistema.quarto.mainQuarto', ['tudo'=>$tudo, 'checkin'=>$checkin, 'checkout'=>$checkout]);
    }


    public function indexLista()
    {
//     Paginação OK com 10 hospedes por página - funcionando

        $hotel_id = auth()->user()->getHotelId();

        $checkin = Reserva::with(['hospede', 'quarto'])
            ->where([['reservas.hotel_id', $hotel_id],
                ['reservas.status', '=' ,'aberto'],
                ['reservas.inicioReserva', '=', Carbon::now()]
            ])
            ->get();

        $checkout = Reserva::with(['hospede', 'quarto'])
            ->where([['reservas.hotel_id', $hotel_id],
                ['reservas.status', '=' ,'Iniciada'],
                ['reservas.fimReserva', '=', Carbon::now()]
            ])
            ->get();


        $hotel_id = auth()->user()->getHotelId();

        $quartos = DB::table('quartos')
            ->where('hotel_id', '=', $hotel_id)
            ->orderBy('id')
            ->paginate(10);

        return view('sistema.quarto.listaQuartos', ['quartos' => $quartos, 'checkin'=>$checkin, 'checkout'=>$checkout]);
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

        $hotel_id = auth()->user()->getHotelId();

        $checkin = Reserva::with(['hospede', 'quarto'])
            ->where([['reservas.hotel_id', $hotel_id],
                ['reservas.status', '=' ,'aberto'],
                ['reservas.inicioReserva', '=', Carbon::now()]
            ])
            ->get();

        $checkout = Reserva::with(['hospede', 'quarto'])
            ->where([['reservas.hotel_id', $hotel_id],
                ['reservas.status', '=' ,'Iniciada'],
                ['reservas.fimReserva', '=', Carbon::now()]
            ])
            ->get();

        return view('sistema.quarto.listaQuartos', ['quartos' => $quartos, 'checkin'=>$checkin, 'checkout'=>$checkout]);
    }

    public function cadastrarQuarto()
    {
        $hotel_id = auth()->user()->getHotelId();

        $checkin = Reserva::with(['hospede', 'quarto'])
            ->where([['reservas.hotel_id', $hotel_id],
                ['reservas.status', '=' ,'aberto'],
                ['reservas.inicioReserva', '=', Carbon::now()]
            ])
            ->get();

        $checkout = Reserva::with(['hospede', 'quarto'])
            ->where([['reservas.hotel_id', $hotel_id],
                ['reservas.status', '=' ,'Iniciada'],
                ['reservas.fimReserva', '=', Carbon::now()]
            ])
            ->get();

        return view('sistema.quarto.cadastraQuarto', ['Menu' => 'Core', 'checkin'=>$checkin, 'checkout'=>$checkout]);
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

        $hotel_id = auth()->user()->getHotelId();

        $checkin = Reserva::with(['hospede', 'quarto'])
            ->where([['reservas.hotel_id', $hotel_id],
                ['reservas.status', '=' ,'aberto'],
                ['reservas.inicioReserva', '=', Carbon::now()]
            ])
            ->get();

        $checkout = Reserva::with(['hospede', 'quarto'])
            ->where([['reservas.hotel_id', $hotel_id],
                ['reservas.status', '=' ,'Iniciada'],
                ['reservas.fimReserva', '=', Carbon::now()]
            ])
            ->get();


        return redirect()->route('sistema.lista.quartos')
            ->with('message', 'Quarto cadastrado com sucesso.')
            ->with('checkin', $checkin)
            ->with('checkout', $checkout);

    }

    public function inativar($id)
    {
        $quarto = Quarto::find($id);
        $quarto->status_quarto='Inativo';
        $quarto->save();

        $hotel_id = auth()->user()->getHotelId();

        $checkin = Reserva::with(['hospede', 'quarto'])
            ->where([['reservas.hotel_id', $hotel_id],
                ['reservas.status', '=' ,'aberto'],
                ['reservas.inicioReserva', '=', Carbon::now()]
            ])
            ->get();

        $checkout = Reserva::with(['hospede', 'quarto'])
            ->where([['reservas.hotel_id', $hotel_id],
                ['reservas.status', '=' ,'Iniciada'],
                ['reservas.fimReserva', '=', Carbon::now()]
            ])
            ->get();


        return redirect()
            ->route('sistema.lista.quartos')
            ->with('message_inative', 'Quarto inativado com sucesso')
            ->with('checkin', $checkin)
            ->with('checkout', $checkout);
    }
    public function ativar($id)
    {
        $quarto = Quarto::find($id);
        $quarto->status_quarto='Ativo';
        $quarto->save();
        $hotel_id = auth()->user()->getHotelId();

        $checkin = Reserva::with(['hospede', 'quarto'])
            ->where([['reservas.hotel_id', $hotel_id],
                ['reservas.status', '=' ,'aberto'],
                ['reservas.inicioReserva', '=', Carbon::now()]
            ])
            ->get();

        $checkout = Reserva::with(['hospede', 'quarto'])
            ->where([['reservas.hotel_id', $hotel_id],
                ['reservas.status', '=' ,'Iniciada'],
                ['reservas.fimReserva', '=', Carbon::now()]
            ])
            ->get();

        return redirect()
            ->route('sistema.lista.quartos')
            ->with('message_active', 'Quarto Ativado com sucesso')
            ->with('checkin', $checkin)
            ->with('checkout', $checkout);
    }

    public function editarQuarto($id)
    {
        $registro = Quarto::find($id);
        $hotel_id = auth()->user()->getHotelId();

        $checkin = Reserva::with(['hospede', 'quarto'])
            ->where([['reservas.hotel_id', $hotel_id],
                ['reservas.status', '=' ,'aberto'],
                ['reservas.inicioReserva', '=', Carbon::now()]
            ])
            ->get();

        $checkout = Reserva::with(['hospede', 'quarto'])
            ->where([['reservas.hotel_id', $hotel_id],
                ['reservas.status', '=' ,'Iniciada'],
                ['reservas.fimReserva', '=', Carbon::now()]
            ])
            ->get();

        return view('sistema.quarto.editaQuarto', compact('registro'),
            ['checkin'=>$checkin, 'checkout'=>$checkout]);

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
        $hotel_id = auth()->user()->getHotelId();

        $checkin = Reserva::with(['hospede', 'quarto'])
            ->where([['reservas.hotel_id', $hotel_id],
                ['reservas.status', '=' ,'aberto'],
                ['reservas.inicioReserva', '=', Carbon::now()]
            ])
            ->get();

        $checkout = Reserva::with(['hospede', 'quarto'])
            ->where([['reservas.hotel_id', $hotel_id],
                ['reservas.status', '=' ,'Iniciada'],
                ['reservas.fimReserva', '=', Carbon::now()]
            ])
            ->get();

        return redirect()->route('sistema.lista.quartos')
            ->with('message5', 'Quarto atualizado com sucesso.')
            ->with('checkout', $checkout)
            ->with('checkin', $checkin);

    }
}
