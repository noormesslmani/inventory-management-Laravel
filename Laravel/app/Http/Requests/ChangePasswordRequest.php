<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class ChangePasswordRequest extends BaseRequest
{
  
    public function rules(): array
    {
        return [
            'old_password' => 'required|string|min:6|max:50',
            'new_password'  => 'required|string|min:6|max:50'
        ];
    }
}

