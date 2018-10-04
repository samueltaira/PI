<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospede extends Model
{

    protected $fillable = [
        'id',  'nome', 'cidade', 'email', 'contato', 'documento', 'dataNascimento', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
