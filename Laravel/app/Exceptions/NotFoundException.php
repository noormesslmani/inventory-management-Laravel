<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class NotFoundException extends Exception
{
    public function report()
    {
       
    }

    public function render()
    {
        return [
            "success" => false,
            "message" => 'Entity not found',
            "data" => [],
            'http_code' => Response::HTTP_NOT_FOUND
        ];
    }
}
