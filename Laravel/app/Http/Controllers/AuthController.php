<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\AuthService;
use App\Contracts\AuthServiceInterface;
use App\Repositories\AuthRepository;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\AuthenticateUserRequest;
use App\Traits\PrepareResponseTrait;
use JWTAuth;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;



class AuthController extends Controller
{

    use PrepareResponseTrait;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    
    public function register(CreateUserRequest $request): JsonResponse{
       
        $validatedData = array_merge($request->validated(), ['profile_picture' => 'no-profile.png']);
        
        $result = $this->authService-> registerUser($validatedData);

        return $this->prepareResponse($result['data'], $result['message'], $result['http_code']);
           
    }

      


    public function authenticate(AuthenticateUserRequest $request) : JsonResponse
    {

        $result = $this->authService->authenticateUser($request->validated());

        return $this->prepareResponse($result['data'], $result['message'], $result['http_code']);
           
    }

}

