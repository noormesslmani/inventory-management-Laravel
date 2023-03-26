<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class BaseRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    
    public function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'success' => false,
            'data' => [],
            'message' => $validator->errors(),
        ], 422);

        throw (new ValidationException($validator, $response))->status(422);
    }
}