<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class ConflictException extends Exception
{
    public function report()
    {
       
    }

    public function render()
    {
        return [
            "success" => false,
            "message" => 'Entity already exist',
            "data" => [],
            'http_code' => Response::CONFLICT
        ];
    }
}