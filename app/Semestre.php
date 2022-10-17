<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    protected $fillable = [
        'nom'
    ];
    public function evaluations(){
        return $this->hasMany(Evaluation::class);
    }
}
