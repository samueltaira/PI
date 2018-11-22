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
            ->paginate(20);
        $reservasAlteradas = Reserva::with(['hospede', 'quarto'])
            ->where('reservas.hotel_id', $hotel_id)
            ->where('reservas.status', '<>', 'aberto')
            ->paginate(20);

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

        return view('sistema.reserva.mainReserva', ['reservas' => $reservas,
            'reservasAlteradas' => $reservasAlteradas, 'checkin'=>$checkin, 'checkout'=>$checkout]);
    }

    public function pesquisaReserva(Request $req)
    {
        $search = $req->get('valorPesquisadoReserva');
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


        $reservasAlteradas = Reserva::with(['hospede', 'quarto'])
            ->where('reservas.hotel_id', $hotel_id)
            ->where('reservas.status', '<>', 'aberto')
            ->paginate(20);

        if($search){
            $reservas = Reserva::with(['hospede', 'quarto'])
            ->where('reservas.hotel_id', $hotel_id)
            ->where('reservas.status', 'aberto')
            ->where('inicioReserva', '=', '%' . $search . '%')
            ->orderBy('inicioReserva')
            ->paginate(20);
        } else{
            $reservas = Reserva::with(['hospede', 'quarto'])
                ->where('reservas.hotel_id', $hotel_id)
                ->where('reservas.status', 'aberto')
                ->paginate(20);
            return view('sistema.reserva.mainReserva', ['reservas' => $reservas, 'reservasAlteradas' => $reservasAlteradas,
                'checkin'=>$checkin, 'checkout'=>$checkout]);
        }
        return view('sistema.reserva.mainReserva', ['reservas' => $reservas, 'reservasAlteradas' => $reservasAlteradas,
            'checkout'=>$checkout, 'checkin'=>$checkin]);
    }

    public function pesquisaReservaAlterada(Request $req)
    {
        $hotel_id = auth()->user()->getHotelId();
        $search = $req->get('valorPesquisadoReservaAlterada');
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
        $reservas = Reserva::with(['hospede', 'quarto'])
            ->where('reservas.hotel_id', $hotel_id)
            ->where('reservas.status', 'aberto')
            ->paginate(20);

        if($search){
             $reservasAlteradas = Reserva::with(['hospede', 'quarto'])
            ->where('reservas.hotel_id', $hotel_id)
            ->where('reservas.status', '<>', 'aberto')
            ->where('inicioReserva', '=', '%' . $search . '%')
            ->orderBy('inicioReserva')
            ->paginate(20);
            return view('sistema.reserva.mainReserva', ['reservas' => $reservas, 'reservasAlteradas' => $reservasAlteradas,
                'checkin'=>$checkin, 'checkout'=>$checkout]);
        }else{
            $reservasAlteradas = Reserva::with(['hospede', 'quarto'])
                ->where('reservas.hotel_id', $hotel_id)
                ->where('reservas.status', '<>', 'aberto')
                ->paginate(20);

            return view('sistema.reserva.mainReserva', ['reservas' => $reservas, 'reservasAlteradas' => $reservasAlteradas,
                'checkin'=>$checkin, 'checkout'=>$checkout]);
        }

    }

    public function mainNovaReserva()
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

        return view('sistema.reserva.cadastraReserva', ['checkin'=>$checkin, 'checkout'=>$checkout]);
    }

    public function checkReserva(Request $req)
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
                        'mensagem' => 'Favor verificar a data de início da reserva',
                        'checkin'=>$checkin, 'checkout'=>$checkout]);
            } else if ($fimReserva <= $inicioReserva) {
                return view('sistema.reserva.cadastraReserva',
                    ['inicioReserva' => $inicioReserva, 'fimReserva' => $fimReserva,
                        'mensagem' => 'Favor verificar a data final da reserva',
                        'checkin'=>$checkin, 'checkout'=>$checkout]);
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
                        ($reserva->status == 'Cancelado' || $reserva->status == 'Fechada')
                        ||
                        ($inicioReserva >= $reserva->inicioReserva && $fimReserva <= $reserva->fimReserva) &&
                        ($reserva->status == 'Cancelado' || $reserva->status == 'Fechada'))
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
                ['hotel' => $t1, 'inicioReserva' => $inicioReserva, 'fimReserva' => $fimReserva,
                    'checkin'=>$checkin, 'checkout'=>$checkout]);
        }
    }

    public function realizaReserva(Request $req)
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
            ->with('message', 'Reserva efetuada com sucesso.')
            ->with('checkin', $checkin)
            ->with('checkout', $checkout);
    }

    public function cancelarReserva($id)
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

        $reserva = Reserva::find($id);
        $reserva->status = 'Cancelado';
        $reserva->save();

        return redirect()
            ->route('core.reserva')
            ->with('message_cancelado', 'Reserva cancelada com sucesso')
            ->with('checkin', $checkin)
            ->with('checkout', $checkout);

    }

    public function iniciarReserva($id){
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

        $reserva = Reserva::find($id);
        $reserva->status="Iniciada";
        $reserva->save();

        return redirect()
            ->route('sistema.home')
            ->with('checkin', $checkin)
            ->with('checkout', $checkout);

    }
    public function fecharReserva($id){
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

        $reserva = Reserva::find($id);
        $reserva->status="Fechada";
        $reserva->save();

        return redirect()->route('sistema.home')
        ->with('checkin', $checkin)
        ->with('checkout', $checkout);;

    }
}


