<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $fillable = [
        'nom'
    ];

    public function classes(){
        return $this->hasMany(Classe::class);
    }
}
