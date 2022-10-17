<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 30/05/2020
 * Time: 11:57
 */

namespace App\Repositories;

use App\Classe;
use App\Matiere;

class MatiereRepository extends RessourceRepository{
    public function __construct(Matiere $matiere){
        $this->model = $matiere;
    }
    public function getAllMatieres(){
        return Matiere::with(['coefficient','programme' ,'professeur'])
        ->get();
    }
    public function getMatiereByClasse(){
        return Classe::with(['matieres','matieres.coefficient'])
        ->get();
    }
}
