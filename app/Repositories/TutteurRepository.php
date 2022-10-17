<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 02/06/2020
 * Time: 22:56
 */

namespace App\Repositories;


use App\Tutteur;

class TutteurRepository extends RessourceRepository{
    public function __construct(Tutteur $tutteur){
        $this->model = $tutteur;
    }
}