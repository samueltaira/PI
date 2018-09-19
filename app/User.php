<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Requests;
use App\Notifications\ResetPassword;;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'nome',  'hotel', 'email', 'password', 'telefone', 'quartos', 'admin',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        // Não esquece: use App\Notifications\ResetPassword;
        $this->notify(new ResetPassword($token));
    }


}
