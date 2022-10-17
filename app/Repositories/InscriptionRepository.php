<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 30/05/2020
 * Time: 11:56
 */

namespace App\Repositories;


use App\Inscription;

class InscriptionRepository extends  RessourceRepository{
    public function __construct(Inscription $inscription){
        $this->model = $inscription;
    }
    public function getAllinscriptions(){
        return Inscription::with(['anneeScolaire','classe','eleve','programme'])
        ->get();
    }
}
