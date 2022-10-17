<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $fillable = [
        'nom','niveau_id','annee_scolaire_id','serie_id','tarif_id'
    ];
    public function niveau(){
        return $this->belongsTo(Niveau::class);
    }
    public function anneeScolaire(){
        return $this->belongsTo(AnneeScolaire::class);
    }
    public function serie(){
        return $this->belongsTo(Serie::class);
    }
    public function  tarif(){
        return $this->belongsTo(Tarif::class);
    }
    public function programmes(){
        return $this->belongsToMany(Programme::class);
    }
    public function plannings(){
        return $this->hasMany(Planning::class);
    }
    public function inscriptions(){
        return $this->hasMany(Inscription::class);
    }
    public function cahierTexte(){
        return $this->hasMany(CahierTexte::class);
    }
    public function evaluations(){
        return $this->hasMany(Evaluation::class);
    }
}
