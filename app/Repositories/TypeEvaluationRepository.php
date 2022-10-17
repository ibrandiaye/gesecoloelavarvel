<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 30/05/2020
 * Time: 12:05
 */

namespace App\Repositories;


use App\TypeEvaluation;

class TypeEvaluationRepository extends RessourceRepository {
    public function __construct(TypeEvaluation $typeEvaluation){
        $this->model = $typeEvaluation;
    }
}