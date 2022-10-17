<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coefficient extends Model
{
    protected $fillable = [
        'coef'
    ];

    public function matieres(){
        return $this->hasMany(Matiere::class);
    }
}
