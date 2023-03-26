z<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class AuthenticateUserRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'email'      => 'required|email',
            'password'   => 'required|string|min:6|max:50',
        ];
    }
}
