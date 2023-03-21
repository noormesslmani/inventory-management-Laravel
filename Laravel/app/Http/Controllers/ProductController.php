<?php

namespace App\Http\Controllers;

use App\Contracts\Service\ProductServiceInterface;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Traits\PrepareResponseTrait;

class ProductController extends Controller
{
    use PrepareResponseTrait;
    protected $productService;
    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index(): JsonResponse
    {
        $result = $this->productService->index();
        return $this->prepareResponse($result['data'], $result['message'], $result['http_code']);
    }


    public function create(CreateProductRequest $request): JsonResponse
    {
        $data = $request->validated();
        $result = $this->productService->create($data);
        return $this->prepareResponse($result['data'], $result['message'], $result['http_code']);
    }

    public function update(UpdateProductRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();
        $result = $this->productService->update($data, $id);
        return $this->prepareResponse($result['data'], $result['message'], $result['http_code']);
    }

    public function destroy(int $id): JsonResponse
    {
        $result = $this->productService->destroy($id);
        return $this->prepareResponse($result['data'], $result['message'], $result['http_code']);
    }

    public function search(Request $request): JsonResponse
    {
        $type=$request->query('type');
        $result = $this->productService->search($type);
        return $this->prepareResponse($result['data'], $result['message'], $result['http_code']);
    }
}
