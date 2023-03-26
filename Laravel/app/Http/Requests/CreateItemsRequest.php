<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;



class CreateItemsRequest extends BaseRequest
{


    public function rules(): array
    {
        return [
            'product_id' => 'required|integer',
            'serialNumbers' => 'required|array',
            'serialNumbers.*' => 'string|min:10', 
        ];
    }
}