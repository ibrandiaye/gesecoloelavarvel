<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mois extends Model
{
    protected $fillable = [
        'nom'
    ];
    public function paiements(){
        return $this->hasMany(Paiement::class);
    }
}
