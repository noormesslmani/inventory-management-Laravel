<?php

namespace App\Services;

use App\Contracts\Repository\ItemRepositoryInterface;
use App\Contracts\Repository\ProductRepositoryInterface;
use App\Contracts\Service\ItemServiceInterface;

use Symfony\Component\HttpFoundation\Response;

use App\Exceptions\NotFoundException;
use App\Exceptions\ActionForbiddenException;

use Illuminate\Support\Facades\Auth;

class ItemService implements ItemServiceInterface
{
    protected $itemRepository;
    protected $productRepository;

    public function __construct(itemRepositoryInterface $itemRepository, productRepositoryInterface $productRepository)
    {
        $this->itemRepository = $itemRepository;
        $this->productRepository = $productRepository;
    }

    public function index(int $product_id): array
    {
        //retreive the product which items belong to
        $product = $this->productRepository->show($product_id);

        if(!$product){
            $exception = new NotFoundException();
            return $exception->render();
        }

        if($product->owner_id!=Auth::id()){
            $exception = new ActionForbiddenException();
            return $exception->render();
        }

        $items = $this->itemRepository->index($product);
        
        return [
            'success' => true,
            'message' => 'Items successfully retrieved',
            'data' => [
                "items" => $items
            ],
            'http_code' => Response::HTTP_OK
        ];
    }

    public function search(int $product_id, string $serial_number): array
    {
        //retreive the product which items belong to
        $product = $this->productRepository->show($product_id);

        if(!$product){
            $exception = new NotFoundException();
            return $exception->render();
        }

        if($product->owner_id!=Auth::id()){
            $exception = new ActionForbiddenException();
            return $exception->render();
        }

       $items= $this->itemRepository->search($serial_number, $product );
       return [
        'success' => true,
        'message' => 'Items successfully retrieved',
        'data' => [
            "items" => $items
        ],
        'http_code' => Response::HTTP_OK
        ];
    }

    public function create(array $data): array
    {

        $product = $this->productRepository->show($data['product_id']);

        if(!$product){
            $exception = new NotFoundException();
            return $exception->render();
        }

        if($product->owner_id!=Auth::id()){
            $exception = new ActionForbiddenException();
            return $exception->render();
        }

    
       $items= $this->itemRepository->create($data['serialNumbers'],$data['product_id']);

       return [
        'success' => true,
        'message' => 'Items successfully created',
        'data' => [
            "items" => $items
        ],
        'http_code' => Response::HTTP_CREATED
        ];
    }

    public function update(array $data, int $item_id): array
    {
        $item = $this->itemRepository->show($item_id);

        if(!$item){
            $exception = new NotFoundException();
            return $exception->render();
        }

        if($item->owner()->id!=Auth::id()){
            $exception = new ActionForbiddenException();
            return $exception->render();
        }

        $updatedItem= $this->itemRepository->update($data,$item);

        return [
            'success' => true,
            'message' => 'Item successfully updated',
            'data' => [
                "item" => $updatedItem
            ],
            'http_code' => Response::HTTP_OK
        ];
    }

    public function destroy(int $item_id): array
    {
        $item = $this->itemRepository->show($item_id);

        if(!$item){
            $exception = new NotFoundException();
            return $exception->render();
        }

        if($item->owner()->id!=Auth::id()){
            $exception = new ActionForbiddenException();
            return $exception->render();
        }

        $this->itemRepository->destroy($item);

        return [
            'success' => true,
            'message' => 'Item successfully deleted',
            'data' => [],
            'http_code' => Response::HTTP_OK
        ];
    }

}