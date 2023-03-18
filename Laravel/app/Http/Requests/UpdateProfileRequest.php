<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'string|min:2',
            'last_name'  => 'string|min:2',
            'profile_picture'=> 'string',
        ];
    }
}