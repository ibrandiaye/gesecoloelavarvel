<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 30/05/2020
 * Time: 12:04
 */

namespace App\Repositories;


use App\Serie;

class SerieRepository extends RessourceRepository{
    public function __construct(Serie $serie){
        $this->model =$serie;
    }
}