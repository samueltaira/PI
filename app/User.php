<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'nome',  'hotel', 'email', 'password', 'telefone', 'quartos', 'admin',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
}
