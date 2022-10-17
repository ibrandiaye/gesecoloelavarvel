<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 30/05/2020
 * Time: 12:04
 */

namespace App\Repositories;


use App\Programme;
use Illuminate\Support\Facades\DB;

class ProgrammeRepository extends RessourceRepository{
    public function __construct(Programme $programme){
        return $this->model = $programme;
    }

   /* public function getProgrammeByClasse($id){
        return DB::table()
    }*/
}