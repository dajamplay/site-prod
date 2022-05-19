<?php

namespace App\Repositories;

use App\Models\User\User;

class EloquentUserRepository implements UserRepository
{
    public function getByLogin(string $login): User|null
    {
        return User::where('login', '=' ,$login)->first() ?? null;
    }
}