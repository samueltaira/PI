<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Consumo;
use App\Reserva;
use App\Quarto;
use App\Hospede;
use Carbon\Carbon;

class ConsumoController extends Controller
{
    public function adicionarConsumo(Request $req)
    {
        $dados = $req->all();
        Consumo::create($dados);

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

        return redirect()->route('sistema.home')->with('Mensagem', 'Hóspede cadastrado com sucesso.');
    }
}

?>

