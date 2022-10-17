<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'note','eleve_id','evaluation__id'
    ];
    public function eleve(){
        return $this->belongsTo(Eleve::class);
    }
    public function evaluations(){
        return $this->belongsTo(Evaluation::class);
    }
}
