<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 30/05/2020
 * Time: 11:56
 */

namespace App\Repositories;


use App\Coefficient;

class CoefficientRepository extends RessourceRepository{
    public function __construct(Coefficient $coefficient){
        $this->model = $coefficient;
    }
}