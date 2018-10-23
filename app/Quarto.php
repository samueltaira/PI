<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quarto extends Model
{
    protected $fillable = [
        'id', 'nome', 'capacidade', 'status_reserva', 'hotel_id'
    ];

    public function hotels()
    {
        return $this->belongsTo(Hotel::class);
    }
}
