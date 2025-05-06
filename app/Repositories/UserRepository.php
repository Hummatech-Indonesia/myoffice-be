<?php

namespace App\Repositories; 

use App\Models\User;
use App\Interface\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {

    public function findByEmail(string $email) {
        return User::where("email", $email)->first();
    }

    public function createUser(array $data) {
        return User::create($data);
    }
}

