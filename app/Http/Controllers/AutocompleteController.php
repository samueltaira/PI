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
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('hospedes')
                ->where('nome', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '<li><a href="#">'.$row->nome.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
