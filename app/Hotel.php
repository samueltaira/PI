<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['hotel'];

    public function getId()
    {
        return $this->id;
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function hospedes()
    {
        return $this->hasMany(Hospede::class);
    }
}
