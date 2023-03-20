<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductPaginationResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'total_pages'=>$this->lastPage(),
            'current_page'=>$this->currentPage(),
            'products'=>$this->items()
        ];
    }
}
