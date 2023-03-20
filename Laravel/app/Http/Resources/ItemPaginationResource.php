<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemPaginationResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'total_pages'=>$this->lastPage(),
            'current_page'=>$this->currentPage(),
            'items'=>$this->items()
        ];
    }
}
