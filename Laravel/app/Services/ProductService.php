<?php

namespace App\Services;

use App\Contracts\ProductRepositoryInterface;
use App\Contracts\ProductServiceInterface;
use App\Contracts\ImageServiceInterface;

use Symfony\Component\HttpFoundation\Response;

use App\Exceptions\NotFoundException;
use App\Exceptions\ActionForbiddenException;

use Illuminate\Support\Facades\Auth;

class ProductService implements ProductServiceInterface
{
    protected $productRepository;
    protected $imageService;

    public function __construct(ProductRepositoryInterface $productRepository, ImageServiceInterface $imageService)
    {
        $this->productRepository = $productRepository;
        $this->imageService = $imageService;
    }

    public function index(): array
    {
       
        $products = $this->productRepository->index();
        
        return [
            'success' => true,
            'message' => 'Products successfully retrieved',
            'data' => [
                "products" => $products
            ],
            'http_code' => Response::HTTP_OK
        ];
    }

    public function search(string $type): array
    {
       
        $products = $this->productRepository->search($type);
        
        return [
            'success' => true,
            'message' => 'Products successfully retrieved',
            'data' => [
                "products" => $products
            ],
            'http_code' => Response::HTTP_OK
        ];
    }

    public function create(array $data): array
    {
       
        $image_path= $this->imageService->decodeImage($data['base64_image']);
        
        $product = $this->productRepository->create(array_merge($data,['image'=>$image_path]));
        
        return [
            'success' => true,
            'message' => 'Products successfully created',
            'data' => [
                "product" => $product
            ],
            'http_code' => Response::HTTP_CREATED
        ];
    }

    public function update(array $data, int $id): array
    {
        
        if(isset($data['base64_image'])){
            $image_path= $this->imageService->decodeImage($data['base64_image'] );
            $data= array_merge($data,['image'=>$image_path]);
        }

        
        $product = $this->productRepository->show($id);

        if(!$product){
            $exception = new NotFoundException();
            return $exception->render();
        }
           
        if($product->owner_id!=Auth::id()){
            $exception = new ActionForbiddenException();
            return $exception->render();
        }

        $updatedProduct = $this->productRepository->update(array_merge($data,['owner_id'=>$id]), $product);
        
        
        return [
            'success' => true,
            'message' => 'Product successfully updated',
            'data' => [
                "product" => $product
            ],
            'http_code' => Response::HTTP_OK
        ];
    }

    public function destroy(int $id): array
    {
       
        $product = $this->productRepository->show($id);

        if(!$product){
            $exception = new NotFoundException();
            return $exception->render();
        }
           
        if($product->owner_id!=Auth::id()){
            $exception = new ActionForbiddenException();
            return $exception->render();
        }

        $updatedProduct = $this->productRepository->destroy($product);
        
        return [
            'success' => true,
            'message' => 'Product successfully deleted',
            'data' => [],
            'http_code' => Response::HTTP_OK
        ];
    }

}