<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 30/05/2020
 * Time: 11:58
 */

namespace App\Repositories;


use App\Mois;

class MoisRepository extends RessourceRepository{
    public function __construct(Mois $mois){
        $this->model = $mois;
    }
}