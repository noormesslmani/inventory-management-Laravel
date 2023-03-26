<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;



class UpdateProductRequest extends BaseRequest
{

    public function rules(): array
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