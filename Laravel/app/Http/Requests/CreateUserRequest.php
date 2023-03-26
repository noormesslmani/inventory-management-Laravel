<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class CreateUserRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|min:2',
            'last_name'  => 'required|string|min:2',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|string|min:6|max:50',
        ];
    }
}