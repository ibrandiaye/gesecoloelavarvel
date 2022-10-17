<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 30/05/2020
 * Time: 11:58
 */

namespace App\Repositories;


use App\Niveau;

class NiveauRepository extends RessourceRepository{
    public function __construct(Niveau $niveau){
        $this->model = $niveau;
    }
}