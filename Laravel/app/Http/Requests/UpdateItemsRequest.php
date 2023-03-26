<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class UpdateItemsRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'serial_number' => 'string|min:10',
            'is_sold' => 'boolean', 
        ];
    }
}