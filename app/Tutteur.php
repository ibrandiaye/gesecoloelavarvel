<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutteur extends Model
{
    protected $fillable = [
        'nom','prenom','adresse','telephone','email'
    ];
    public function eleves(){
        return $this->hasMany(Eleve::class);
    }

}
