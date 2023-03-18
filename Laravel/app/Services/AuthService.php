<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use App\Contracts\Service\AuthServiceInterface;
use App\Contracts\Repository\AuthRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use APP\Exceptions\ConflictException;


class AuthService implements AuthServiceInterface
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function registerUser(array $userData): array
    {
        $user= $this->authRepository->create($userData);
        return [
            'success' => true,
            'message' => 'User created successfully',
            'data' => [
                "user" => $user
            ],
            'http_code' => Response::HTTP_CREATED
        ];
    }

    public function authenticateUser(array $credentials): array
    {
       
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return [
                    'success' => false,
                    'message' => 'Login credentials are invalid',
                    'data' => [],
                    'http_code' => Response::HTTP_BAD_REQUEST
                ];
            }
        } catch (JWTException $e) {
            return [
                
                'success' => false,
                'message' => 'Could not create token',
                'data' => [],
                'http_code' => Response::HTTP_SERVICE_UNAVAILABLE
            ];
        }

        return [
            'success' => true,
            'message' => 'User Authenticated successfully',
            'data' => [
                'token' => $token
            ],
            'http_code' => Response::HTTP_OK
        ];
    }
}