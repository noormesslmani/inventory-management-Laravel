<?php

namespace App\Contracts;

use App\Models\User;

interface AuthRepositoryInterface
{
    public function create(array $data): User;

}
