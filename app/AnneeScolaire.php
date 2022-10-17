<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnneeScolaire extends Model
{
    protected $fillable = [
        'annee'
    ];

    public function classes(){
        return $this->hasMany(Classe::class);
    }
    public function inscriptions(){
        return $this->hasMany(Inscription::class);
    }
}
