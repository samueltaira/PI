<?php

namespace App\Http\Controllers\Sistema;

use App\Reserva;
use App\Quarto;
use App\Hospede;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservaController extends Controller
{

    public function mainReserva()
    {
        $hotel_id = auth()->user()->getHotelId();
        $reservas = DB::table('reservas')
            ->select('reservas.*', 'hospedes.*')
            ->join('hospedes', 'hospedes.id', '=', 'reservas.hospede_id')
            ->where('reservas.hotel_id', '=', $hotel_id)
            ->get();
        return view('sistema.reserva.mainReserva', ['reservas' => $reservas]);
    }

    public function mainNovaReserva()
    {
        return view('sistema.reserva.cadastraReserva');
    }

    public function checkReserva(Request $req)
    {
        $d = $req->all();

        $inicioReserva = $req->inicioReserva;
        $fimReserva = $req->fimReserva;
        $capacidade = $req->capacidade;
        $hotel_id = auth()->user()->getHotelId();

        $reservas = DB::table('reservas')
            ->where('hotel_id', '=', $hotel_id)
            ->where('inicioReserva', '!=', $inicioReserva)
            ->get();

        $teste[] = 0;

            foreach($reservas as $reserva){
            $teste[] = $reserva->quarto_id;
        }

        $quartosId = DB::table('quartos')
            ->where('hotel_id', '=', $hotel_id)
            ->where('capacidade', '=', $capacidade)
            ->whereNotIn('id', $teste)
            ->get();

        return view('sistema.reserva.cadastraReserva', ['quartosId' => $quartosId]);

    }

    public function realizaReserva(Request $req)
    {
        $dados = $req->all();
        Reserva::create($dados);

        return redirect()->route('core.reserva')
            ->with('message', 'Reserva efetuada com sucesso.');
    }
}




//            $mensagens = [
//                'dataInicio.required' => "Preencher data início",
//                'dataFim.required' => "Preencher data fim"
//            ];
//
//            $this->validate($req,
//                [
//                    'dataInicio' => 'required',
//                    'dataFim' => 'required'
//                ], $mensagens);