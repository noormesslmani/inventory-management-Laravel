<?php

namespace App\Contracts\Service;
use App\Models\User;

interface ProfileServiceInterface
{
    public function updateProfile(array $data): array;
    public function changePassword(array $data) : array;
}