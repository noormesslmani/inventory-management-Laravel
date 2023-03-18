<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'old_password' => 'required|string|min:6|max:50',
            'new_password'  => 'required|string|min:6|max:50'
        ];
    }
}