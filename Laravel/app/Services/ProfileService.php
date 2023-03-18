<?php

namespace App\Services;

use App\Contracts\Repository\ProfileRepositoryInterface;
use App\Contracts\Service\ProfileServiceInterface;

use Symfony\Component\HttpFoundation\Response;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ProfileService implements ProfileServiceInterface

{
    protected $profileRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function updateProfile(array $data): array
    {
        $user = $this->profileRepository->update($data);
        return [
            'success' => true,
            'message' => 'Profile updated successfully',
            'data' => [
                "user" => $user
            ],
            'http_code' => Response::HTTP_OK
        ];
    }

    public function changePassword(array $data) : array 
    {
        if(Hash::check($data['old_password'], Auth::user()->password)){
            $this->profileRepository->update(["password"=>bcrypt($data['new_password'])]);
            return [
                'success' => true,
                'message' => 'Password Changed successfully',
                'data' =>[],
                'http_code' => Response::HTTP_OK
            ];
        }
        else{
            return [
                'success' => false,
                'message' => 'Wrong password entered',
                'data' =>[],
                'http_code' =>  Response::HTTP_UNAUTHORIZED
            ];
        }
    }

}