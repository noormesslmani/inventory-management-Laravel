<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchItemRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'serial-number' => 'required|string|min:10',
        ];
    }
}
