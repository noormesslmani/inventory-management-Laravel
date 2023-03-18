<?php

namespace App\Http\Controllers;

use App\Contracts\Service\ItemServiceInterface;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Requests\CreateItemsRequest;
use App\Http\Requests\UpdateItemsRequest;
use App\Http\Requests\SearchItemRequest;

use App\Traits\PrepareResponseTrait;

class ItemController extends Controller
{
    use PrepareResponseTrait;

    public function __construct(ItemServiceInterface $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index(int $product_id): JsonResponse
    {
        $result = $this->itemService->index($product_id);
        return $this->prepareResponse($result['data'], $result['message'], $result['http_code']);
    }

    public function create(CreateItemsRequest $request): JsonResponse
    {
        $data = $request->validated();
        $result = $this->itemService->create($data);
        return $this->prepareResponse($result['data'], $result['message'], $result['http_code']);
    }

    public function update(UpdateItemsRequest $request, int $item_id): JsonResponse
    {
        $data = $request->validated();
        $result = $this->itemService->update($data, $item_id);
        return $this->prepareResponse($result['data'], $result['message'], $result['http_code']);
    }
    
    public function destroy(int $item_id): JsonResponse
    {
        $result = $this->itemService->destroy($item_id);
        return $this->prepareResponse($result['data'], $result['message'], $result['http_code']);
    }

    public function search(SearchItemRequest $request, int $product_id): JsonResponse
    {
        $serial_number=$request->query('serial-number');
        $result = $this->itemService->search($product_id, $serial_number);
        return $this->prepareResponse($result['data'], $result['message'], $result['http_code']);
    }
}
