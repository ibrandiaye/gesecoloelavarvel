<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = [
        'montant','mois_id','inscription_id'
    ];
    public function mois(){
        return $this->belongsTo(Mois::class);
    }
    public function inscription(){
        return $this->belongsTo(Inscription::class);
    }
}
