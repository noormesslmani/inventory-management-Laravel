<?php

namespace App\Contracts\Repository;

use App\Models\User;

interface AuthRepositoryInterface
{
    public function create(array $data): User;

}
