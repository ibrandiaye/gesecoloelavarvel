<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 30/05/2020
 * Time: 12:04
 */

namespace App\Repositories;


use App\Professeur;

class ProfesseurRepository extends RessourceRepository{
    public function __construct(Professeur $professeur){
        $this->model = $professeur;
    }
}