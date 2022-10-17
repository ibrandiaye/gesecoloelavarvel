<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    protected $fillable = [
        'nom'
    ];
    public function classes(){
        return $this->belongsToMany(Classe::class);
    }
    public function inscriptions(){
        return $this->hasMany(Inscription::class);
    }
    public function matieres(){
        return $this->hasMany(Matiere::class);
    }
}
