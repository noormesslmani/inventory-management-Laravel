<?php

namespace App\Contracts;

use App\Models\Item;
use App\Models\Product;

interface ItemRepositoryInterface
{
    public function index(Product $product ): object;
    public function search(string $serial_number, Product $product): object;
    public function show(int $id): ?Item;
    public function create(array $serialNumbers, int $product_id ): array;
    public function update(array $data, Item $item): Item;
    public function destroy(Item $item): void;
}