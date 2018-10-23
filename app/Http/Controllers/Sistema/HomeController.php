<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        $hotel_id = auth()->user()->getHotelId();
        $quartos = DB::table('quartos')
            ->where('hotel_id', '=', $hotel_id)
            ->orderBy('id')
            ->get();

        return view('sistema.quarto.mainQuarto', ['quartos' => $quartos]);
    }
}
