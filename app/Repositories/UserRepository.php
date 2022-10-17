<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 30/05/2020
 * Time: 12:06
 */

namespace App\Repositories;


use App\User;

class UserRepository extends RessourceRepository{

    public function __construct(User $user){
        $this->model = $user;
    }

}