<?php

namespace App\Repositories;
use App\Models\Product;
use App\Models\User;
use App\Exceptions\NotFoundException;
use App\Exceptions\ActionForbiddenException;
use App\Contracts\Repository\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ProductPaginationResource ;
class ProductRepository implements ProductRepositoryInterface
{
    public function index(): object{
        $products= Auth::user()
        ->products()
        ->withCount('unsoldItems')
        ->latest()
        ->paginate(10);
        return new ProductPagination($products);
    }
  
    public function search(string $type): object{
        $products=Auth::user()
        ->products()
        ->withCount('unsoldItems')
        ->where('type', 'LIKE', '%'.$type.'%')
        ->latest()
        ->paginate(10);
        return new ProductPagination($products);
    }

    public function create(array $data): Product{
        return Product::create(array_merge($data,['owner_id'=>Auth::id()]));
    }


    public function show(int $id): ?Product{
        $product=Product::find($id);
        return $product;
    }

    public function update(array $data, Product $product): Product{
        $product->update($data);
        return $product;

    }
    
    public function destroy(Product $product): void{
        $product->delete();
        return;
    }

}