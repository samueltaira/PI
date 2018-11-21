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
        $reservas = Reserva::with(['hospede', 'quarto'])
            ->where('reservas.hotel_id', $hotel_id)
            ->where('reservas.status', 'aberto')
            ->paginate(10);
        $reservasAlteradas = Reserva::with(['hospede', 'quarto'])
            ->where('reservas.hotel_id', $hotel_id)
            ->where('reservas.status', '<>', 'aberto')
            ->paginate(10);

        return view('sistema.reserva.mainReserva', ['reservas' => $reservas, 'reservasAlteradas' => $reservasAlteradas]);
    }

    public function pesquisaReserva(Request $req)
    {
        $hotel_id = auth()->user()->getHotelId();
        $search = $req->get('valorPesquisadoReserva');


        $reservasAlteradas = Reserva::with(['hospede', 'quarto'])
            ->where('reservas.hotel_id', $hotel_id)
            ->where('reservas.status', '<>', 'aberto')
            ->paginate(10);

        if($search){
            $reservas = Reserva::with(['hospede', 'quarto'])
            ->where('reservas.hotel_id', $hotel_id)
            ->where('reservas.status', 'aberto')
            ->where('inicioReserva', '=', '%' . $search . '%')
            ->orderBy('inicioReserva')
            ->paginate(10);
        } else{

            $reservas = Reserva::with(['hospede', 'quarto'])
                ->where('reservas.hotel_id', $hotel_id)
                ->where('reservas.status', 'aberto')
                ->paginate(10);
            return view('sistema.reserva.mainReserva', ['reservas' => $reservas, 'reservasAlteradas' => $reservasAlteradas]);
        }


        return view('sistema.reserva.mainReserva', ['reservas' => $reservas, 'reservasAlteradas' => $reservasAlteradas]);
    }

    public function pesquisaReservaAlterada(Request $req)
    {
        $hotel_id = auth()->user()->getHotelId();
        $search = $req->get('valorPesquisadoReservaAlterada');

        $reservas = Reserva::with(['hospede', 'quarto'])
            ->where('reservas.hotel_id', $hotel_id)
            ->where('reservas.status', 'aberto')
            ->paginate(10);

        if($search){
             $reservasAlteradas = Reserva::with(['hospede', 'quarto'])
            ->where('reservas.hotel_id', $hotel_id)
            ->where('reservas.status', '<>', 'aberto')
            ->where('inicioReserva', '=', '%' . $search . '%')
            ->orderBy('inicioReserva')
            ->paginate(10);
            return view('sistema.reserva.mainReserva', ['reservas' => $reservas, 'reservasAlteradas' => $reservasAlteradas]);
        }else{
            $reservasAlteradas = Reserva::with(['hospede', 'quarto'])
                ->where('reservas.hotel_id', $hotel_id)
                ->where('reservas.status', '<>', 'aberto')
                ->paginate(10);

            return view('sistema.reserva.mainReserva', ['reservas' => $reservas, 'reservasAlteradas' => $reservasAlteradas]);
        }

    }

    public function mainNovaReserva()
    {
        return view('sistema.reserva.cadastraReserva');
    }

    public function checkReserva(Request $req)
    {
        $hotel_id = auth()->user()->getHotelId();

        $t1 = Hotel::with(['quartos.reservas', 'hospedes'])
            ->where('id', $hotel_id)
            ->first();

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

                foreach ($quarto->reservas as $reserva)
                {
                    if ($inicioReserva == $reserva->fimReserva && $reserva->status == 'aberto')
                    {
                        $t1->quartos->forget($k);
                    }
                    else if(($inicioReserva >= $reserva->inicioReserva && $fimReserva >= $reserva->fimReserva)&&
                        ($reserva->status == 'Cancelado' || $reserva->status == 'Fechado')
                        ||
                        ($inicioReserva >= $reserva->inicioReserva && $fimReserva <= $reserva->fimReserva) &&
                        ($reserva->status == 'Cancelado' || $reserva->status == 'Fechado'))
                    {

                    }
                    else if ($inicioReserva >= $reserva->inicioReserva && $inicioReserva < $reserva->fimReserva)
                    {
                        $t1->quartos->forget($k);
                    }
                    elseif ($fimReserva >= $reserva->inicioReserva && $fimReserva <= $reserva->fimReserva)
                    {
                        $t1->quartos->forget($k);
                    }
                    elseif ($inicioReserva <= $reserva->inicioReserva && $fimReserva >= $reserva->fimReserva)
                    {
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

//        dd($req->all());

        $reserva = new Reserva;

        $reserva->inicioReserva = Carbon::parse($req->input('inicioReserva'));
        $reserva->fimReserva = Carbon::parse($req->input('fimReserva'));
        $reserva->hotel_id = $req->input('hotel_id');
        $reserva->hospede_id = substr($req->input('hospede'), 1, 1);
        $reserva->quarto_id = $req->input('quarto_id');
        $reserva->consumo = $req->input('consumo');
        $reserva->efetuouReserva = $req->input('efetuouReserva');
        $reserva->save();

        return redirect()->route('core.reserva')
            ->with('message', 'Reserva efetuada com sucesso.');
    }

    public function cancelarReserva($id)
    {
        $reserva = Reserva::find($id);
        $reserva->status = 'Cancelado';
        $reserva->save();

        return redirect()
            ->route('core.reserva')
            ->with('message_cancelado', 'Reserva cancelada com sucesso');

    }
}


