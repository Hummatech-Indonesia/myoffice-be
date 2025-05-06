<?php

namespace App\Interface;


interface UserRepositoryInterface {

    public function findByEmail(string $email);

    public function createUser(array $data);

}