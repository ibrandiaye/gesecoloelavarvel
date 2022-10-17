<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $fillable = [
        'inscription','mensualite'
    ];

    public function classes(){
        return $this->hasMany(Classe::class);
    }
}
