<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Consumo extends Model
{
    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
    
}
