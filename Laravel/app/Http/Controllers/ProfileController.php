<?php

namespace App\Http\Controllers;

use App\Contracts\Service\ProfileServiceInterface;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;

use App\Traits\PrepareResponseTrait;

use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    use PrepareResponseTrait;
    protected $profileService;
    public function __construct(ProfileServiceInterface $profileService)
    {
        $this->profileService = $profileService;
    }

    public function index(): JsonResponse
    {
        $user = Auth::user();

        return $this->prepareResponse(["user"=>$user], 'User retrieved successfully', 200);
    }

    public function update(UpdateProfileRequest $request): JsonResponse
    {
        $result = $this->profileService->updateProfile($request->validated());

        return $this->prepareResponse($result['data'], $result['message'], $result['http_code']);
    }


    public function changePassword(ChangePasswordRequest $request): JsonResponse
    {
        $result = $this->profileService->changePassword($request->validated());

        return $this->prepareResponse($result['data'], $result['message'], $result['http_code']);
    }
}
