<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class UpdateProfileRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'first_name' => 'string|min:2',
            'last_name'  => 'string|min:2',
            'profile_picture'=> 'string',
        ];
    }
}