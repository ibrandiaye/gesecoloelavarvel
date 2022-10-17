<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 30/05/2020
 * Time: 12:02
 */

namespace App\Repositories;


use App\Planning;

class PlanningRepository extends RessourceRepository{
    public function __construct(Planning $planning){
        $this->model = $planning;
    }
}