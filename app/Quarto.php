<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quarto extends Model
{
    protected $fillable = [
        'id', 'nome', 'capacidade', 'status_reserva', 'hotel_id', 'status_quarto'
    ];

    public function hotels()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function getNome()
    {
        return $this->nome;
    }
}
