<?php

namespace App\Contracts\Repository;

use App\Models\User;

interface ProfileRepositoryInterface
{
  
    public function update(array $data) : User;

}