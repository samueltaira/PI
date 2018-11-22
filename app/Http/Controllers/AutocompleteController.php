<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
    function index()
    {
        return view('sistema.reserva.cadastraReserva');
    }

    function fetch(Request $request)
    {
        $hotel_id = auth()->user()->getHotelId();

        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('hospedes')
                ->where([
                    ['hotel_id', '=', $hotel_id],
                    ['nome', 'LIKE', "%{$query}%"]])
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row) {
                $output .= '<li><a href="#">('.$row->id.') Nome: ' . $row->nome . ' (Doc: ' . $row->documento . ') </a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
