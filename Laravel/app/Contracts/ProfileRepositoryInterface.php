<?php

namespace App\Contracts;

use App\Models\User;

interface ProfileRepositoryInterface
{
  
    public function update(array $data) : User;

}