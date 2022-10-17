<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeEvaluation extends Model
{
    protected $fillable = [
        'nom'
    ];
    public function evaluations(){
        return $this->hasMany(Evaluation::class);
    }
}
