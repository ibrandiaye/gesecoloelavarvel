<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = [
        'montant','annee_scolaire_id','classe_id','eleve_id','programme_id'
    ];
    public function anneeScolaire(){
        return $this->belongsTo(AnneeScolaire::class);
    }
    public function Classe(){
        return $this->belongsTo(Classe::class);
    }
    public function eleve(){
        return $this->belongsTo(Eleve::class);
    }
    public function programme(){
        return $this->belongsTo(Programme::class);
    }
    public function paiements(){
        return $this->hasMany(Paiement::class);
    }

}
