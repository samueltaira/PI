<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospede extends Model
{

    protected $fillable = [
        'id',  'nome', 'cidade', 'estado', 'email1', 'email2', 'tipoDocumento', 'documento', 'dataNascimento'
    ];


}
