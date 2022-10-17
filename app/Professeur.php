<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    protected $fillable = [
        'nom','prenom','adresse','tel','email','code','date_naiss','cni','photo'
    ];
    public function matieres(){
        return $this->hasMany(Matiere::class);
    }
}
