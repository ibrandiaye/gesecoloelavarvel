<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'note','eleve_id','evaluation_id'
    ];
    public function eleve(){
        return $this->belongsTo(Eleve::class);
    }
    public function evaluation(){
        return $this->belongsTo(Evaluation::class);
    }
}
