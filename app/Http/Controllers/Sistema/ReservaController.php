<?php

namespace App\Http\Controllers\Sistema;

use App\Reserva;
use App\Quarto;
use App\Hospede;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservaController extends Controller
{

    public function mainReserva()
    {
        $hotel_id = auth()->user()->getHotelId();
        $reservas = DB::table('reservas')
            ->select('reservas.*', 'hospedes.*', 'quartos.*')
            ->join('hospedes', 'hospedes.id', '=', 'reservas.hospede_id')
            ->join('quartos', 'quartos.id', '=', 'reservas.quarto_id')
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

        $inicioReserva = $req->inicioReserva;
        $fimReserva = $req->fimReserva;
        $capacidade = $req->capacidade;
        $hotel_id = auth()->user()->getHotelId();

        if ($inicioReserva < Carbon::now()->toDateString()) {
            return view('sistema.reserva.cadastraReserva',
                ['inicioReserva' => $inicioReserva, 'fimReserva' => $fimReserva,
                    'mensagem' => 'Favor verificar a data de início da reserva']);

        } else if ($fimReserva <= $inicioReserva) {
            return view('sistema.reserva.cadastraReserva',
                ['inicioReserva' => $inicioReserva, 'fimReserva' => $fimReserva,
                    'mensagem' => 'Favor verificar a data final da reserva']);
        } else {

            $quartosId = DB::table('quartos')
                ->select('quartos.*', 'reservas.*')
                ->leftJoin('reservas', 'reservas.quarto_id', '=', 'quartos.id')
                ->where('quartos.hotel_id', '=', $hotel_id)
                ->where('capacidade', '=', $capacidade)
                ->get();

            return view('sistema.reserva.cadastraReserva',
                ['quartosId' => $quartosId, 'inicioReserva' => $inicioReserva, 'fimReserva' => $fimReserva]);
        }

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