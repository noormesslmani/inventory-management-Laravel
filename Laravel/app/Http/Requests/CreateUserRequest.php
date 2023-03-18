<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|min:2',
            'last_name'  => 'required|string|min:2',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|string|min:6|max:50',
        ];
    }
}