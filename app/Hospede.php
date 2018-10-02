<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospede extends Model
{

    protected $fillable = [
        'id',  'nome', 'cidade', 'estado', 'email', 'contato', 'documento', 'dataNascimento'
    ];


}
