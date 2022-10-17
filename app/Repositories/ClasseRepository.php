<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 30/05/2020
 * Time: 11:55
 */

namespace App\Repositories;


use App\Classe;

class ClasseRepository extends RessourceRepository{
    public function __construct(Classe $classe){
        $this->model = $classe;
    }
    public function getAllclasses(){
        return Classe::with(['niveau','anneeScolaire','serie','tarif'])
            ->orderBy('id','desc')
            ->get();
    }
}