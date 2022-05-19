<?php

namespace App\Repositories;

use App\Models\User\User;

interface UserRepository
{
    public function getByLogin(string $login): User|null;
}