<?php

namespace App\Repositories;
use App\Models\User;
use App\Contracts\Repository\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{
    public function create(array $data) : User
    {
        
        return User::create([
        	'first_name'       => $data['first_name'],
            'last_name'       => $data['last_name'],
        	'email'      => $data['email'],
        	'profile_picture' => $data['profile_picture'],
        	'password'   => bcrypt($data['password']),
        ]);
    } 
    
}