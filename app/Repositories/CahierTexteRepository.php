<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 30/05/2020
 * Time: 11:55
 */

namespace App\Repositories;


use App\CahierTexte;

class CahierTexteRepository extends RessourceRepository{
    public function __construct(CahierTexte $cahierTexte){
        $this->model = $cahierTexte;
    }
}