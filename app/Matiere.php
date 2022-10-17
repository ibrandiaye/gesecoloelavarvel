<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $fillable = [
        'nom','coefficient_id','programme_id','professeur_id'
    ];

    public function coefficient(){
        return $this->belongsTo(Coefficient::class);
    }
    public function  programme(){
        return $this->belongsTo(Programme::class);
    }
    public function professeur(){
        return $this->belongsTo(Professeur::class);
    }
    public function evaluations(){
        return $this->hasMany(Evaluation::class);
    }
}
