<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 30/05/2020
 * Time: 11:55
 */

namespace App\Repositories;


use App\AnneeScolaire;
use Illuminate\Support\Facades\DB;

class AnneeScolaireRepository extends RessourceRepository{
    public function __construct(AnneeScolaire $anneeScolaire){
        $this->model = $anneeScolaire;
    }
    public function getanneeScolaireDesc(){
        return DB::table('annee_scolaires')
            ->orderBy('id','desc')
            ->get();
    }
}