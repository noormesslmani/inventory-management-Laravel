<?php

namespace App\Repositories;
use App\Models\Item;
use App\Models\Product;
use App\Exceptions\NotFoundException;
use App\Exceptions\ActionForbiddenException;
use App\Contracts\Repository\ItemRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ItemPaginationResource ;
class ItemRepository implements ItemRepositoryInterface
{

    public function index(Product $product ): object{
        $items = $product
            ->items()
            ->orderBy('is_sold', 'asc')
            ->paginate(15);
            return new ItemPagination($items);
    }

    public function search(string $serial_number, Product $product): object{
        $items= $product
            ->items()
            ->where('serial_number', 'LIKE', '%'.$serial_number.'%')
            ->paginate(15);
            return new ItemPagination($items);
    }

    public function show(int $id): ?Item{
        $item=Item::find($id);
        return $item;
    }

    public function create(array $serialNumbers, int $product_id ): array{
        $items=[];
    
        foreach($serialNumbers as $serial_number){
            $item= Item::create(
                [
                'serial_number'=>  $serial_number,
                'is_sold' => false,
                'product_id'=>$product_id,
                ]
            );
            $items[] = $item;
        }

        return $items;
    }

    public function update(array $data, Item $item): Item{
        $item->update($data);
        return $item;

    }
    public function destroy(Item $item): void{
        $item->delete();
        return;
    }

}