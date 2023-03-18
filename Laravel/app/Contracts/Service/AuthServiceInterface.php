<?php

namespace App\Contracts\Service;
use App\Models\User;

interface AuthServiceInterface
{
    public function registerUser(array $userData): array;
    public function authenticateUser(array $userData): array;
}