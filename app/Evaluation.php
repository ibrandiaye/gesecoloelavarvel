<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'libelle','semestre_id','type_evaluation_id','classe_id','matiere_id'
    ];
    public function semestre(){
        return $this->belongsTo(Semestre::class);
    }
    public function typeEvaluation(){
        return $this->belongsTo(TypeEvaluation::class);
    }
    public function classe(){
        return $this->belongsTo(Classe::class);
    }
    public function notes(){
        return $this->hasMany(Note::class);
    }
    public function matiere(){
        return $this->belongsTo(Matiere::class);
    }
}
