<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 30/05/2020
 * Time: 12:05
 */

namespace App\Repositories;


use App\Tarif;

class TarifRepository extends  RessourceRepository{
    public function __construct(Tarif $tarif){
        $this->model = $tarif;
    }
}