<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'id', 'inicioReserva', 'fimReserva', 'hotel_id', 'hospede_id', 'quarto_id', 'consumo', 'efetuouReserva'
    ];

    public function hotels()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function quartos()
    {
        return $this->belongsTo(Quarto::class);
    }

    public function hospedes()
    {
        return $this->belongsTo(Hospede::class);
    }
}
