<?php

namespace App\Http\Requests;
use App\Http\Requests\BaseRequest;

class SearchItemRequest extends BaseRequest
{
   
    public function rules(): array
    {
        return [
            'serial-number' => 'required|string|min:10',
        ];
    }
}
