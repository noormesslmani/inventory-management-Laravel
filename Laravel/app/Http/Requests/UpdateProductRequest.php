<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => 'string|min:2',
            'base64_image' => [
                'sometimes', // only apply validation if the field is present in the request
                'nullable', // allow empty values
                'string', // ensure that the value is a string
            ],
            'description'      => 'string|min:5|max:250',
        ];
    }
}