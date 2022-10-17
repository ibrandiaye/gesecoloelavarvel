<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 30/05/2020
 * Time: 11:59
 */

namespace App\Repositories;


use App\Paiement;

class PaiementRepository extends RessourceRepository{
    public function __construct(Paiement $paiement){
        $this->model = $paiement;
    }
}