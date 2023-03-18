<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class ActionForbiddenException extends Exception
{
    public function report()
    {
       
    }

    public function render()
    {
        return [
            "success" => false,
            "message" => 'Action Forbidden',
            "data" => [],
            'http_code' => Response::HTTP_FORBIDDEN
        ];
    }
}