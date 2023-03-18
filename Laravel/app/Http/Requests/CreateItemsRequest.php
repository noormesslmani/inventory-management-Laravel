<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class CreateItemsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_id' => 'required|integer',
            'serialNumbers' => 'required|array',
            'serialNumbers.*' => 'string|min:10', 
        ];
    }
}