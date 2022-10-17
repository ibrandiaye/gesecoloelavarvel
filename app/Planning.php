<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $fillable = [
        'jour','heure_debut','heure_fin','classe_id','matiere_id'
    ];
    public function classe(){
        return $this->belongsTo(Classe::class);
    }
    public function cahierTexte(){
        return $this->hasMany(CahierTexte::class);
    }
    public function matiere(){
        return $this->belongsTo(Matiere::class);
    }
}
