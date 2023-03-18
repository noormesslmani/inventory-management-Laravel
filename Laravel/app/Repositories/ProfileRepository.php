<?php

namespace App\Repositories;
use App\Models\User;
use App\Contracts\ProfileRepositoryInterface;
use Illuminate\Support\Facades\Auth;
class ProfileRepository implements ProfileRepositoryInterface
{
    public function update(array $data) : User
    {
        
        Auth::user()->update($data);
        return Auth::user();
    }

}