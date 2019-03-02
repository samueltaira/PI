<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Consumo extends Model
{

    protected $fillable = [
        'id', 'item', 'valor', 'quantidade', 'reserva_id'
    ];


    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
    
}
