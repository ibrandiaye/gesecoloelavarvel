<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $fillable = [
        'nom','prenom','adresse','tel','email','code','date_naiss','cni','photo','tutteur_id','lieu_naiss'
    ];

    public function inscriptions(){
        return $this->hasMany(Inscription::class);
    }
    public function notes(){
        return $this->hasMany(Note::class);
    }
    public  function tutteur(){
        return $this->belongsTo(Tutteur::class);
    }
}
