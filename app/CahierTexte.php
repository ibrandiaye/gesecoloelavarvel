<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CahierTexte extends Model
{
    protected $fillable = [
        'contenu','planning_id','classe_id'
    ];
    public function planning(){
        return $this->belongsTo(Planning::class);
    }
    public function  classe(){
        return $this->belongsTo(Classe::class);
    }
}
