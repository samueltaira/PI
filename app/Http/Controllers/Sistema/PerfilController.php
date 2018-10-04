<?php
/**
 * Created by PhpStorm.
 * User: mukkz
 * Date: 03/10/18
 * Time: 22:25
 */

namespace App\Http\Controllers\Sistema;


class PerfilController
{
    public function index()
    {
        return view('sistema.profile');
    }
}