<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 30/05/2020
 * Time: 11:59
 */

namespace App\Repositories;


class NoteRepository extends RessourceRepository{
    public function __construct(Note $note){
        $this->model = $note;
    }
}