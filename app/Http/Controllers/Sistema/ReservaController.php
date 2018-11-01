<?php

namespace App\Http\Controllers\Sistema;

use App\Reserva;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservaController extends Controller
{

    public function mainReserva()
    {
        return view('sistema.reserva.mainReserva');
    }

    public function reservar()
    {

    }

}
