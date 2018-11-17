<?php

namespace App\Http\Controllers\Sistema;

use Input;
use App\Hotel;
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
            ->where('reservas.status', '=', 'aberto')
            ->get();
        return view('sistema.reserva.mainReserva', ['reservas' => $reservas]);
    }

    public function mainNovaReserva()
    {
        return view('sistema.reserva.cadastraReserva');
    }

    public function checkReserva(Request $req)
    {
        $hotel_id = auth()->user()->getHotelId();

        $t1 = Hotel::with(['quartos.reservas'])
            ->where('id', $hotel_id)->first();


        if ($t1) {

            $inicioReserva = $req->inicioReserva;
            $fimReserva = $req->fimReserva;
            $capacidade = $req->capacidade;

            if ($inicioReserva < Carbon::now()->toDateString()) {
                return view('sistema.reserva.cadastraReserva',
                    ['inicioReserva' => $inicioReserva, 'fimReserva' => $fimReserva,
                        'mensagem' => 'Favor verificar a data de início da reserva']);

            } else if ($fimReserva <= $inicioReserva) {
                return view('sistema.reserva.cadastraReserva',
                    ['inicioReserva' => $inicioReserva, 'fimReserva' => $fimReserva,
                        'mensagem' => 'Favor verificar a data final da reserva']);
            }

            foreach ($t1->quartos as $k => $quarto) {

                if ($quarto->capacidade != $capacidade) {
                    $t1->quartos->forget($k);
                }


                foreach ($quarto->reservas as $reserva) {
                    if ($inicioReserva == $reserva->fimReserva && $quarto->status == 'aberto') {
                        $t1->quartos->forget($k);
                    }
                    if ($inicioReserva >= $reserva->inicioReserva && $inicioReserva < $reserva->fimReserva) {
                        $t1->quartos->forget($k);
                    } elseif ($fimReserva >= $reserva->inicioReserva && $fimReserva <= $reserva->fimReserva) {
                        $t1->quartos->forget($k);
                    } elseif ($inicioReserva <= $reserva->inicioReserva && $fimReserva >= $reserva->fimReserva) {
                        $t1->quartos->forget($k);
                    }
                }
            }
            return view('sistema.reserva.cadastraReserva',
                ['hotel' => $t1, 'inicioReserva' => $inicioReserva, 'fimReserva' => $fimReserva]);
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


