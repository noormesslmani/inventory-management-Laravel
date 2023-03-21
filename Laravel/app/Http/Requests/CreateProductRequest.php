<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class CreateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => 'required|string|min:2',
            'base64_image' => [
                'sometimes', // only apply validation if the field is present in the request
                'nullable', // allow empty values
                'string', // ensure that the value is a string
            ],            
            'description'      => 'required|string|min:5|max:250',
        ];
    }
}