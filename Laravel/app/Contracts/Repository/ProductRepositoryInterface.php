<?php

namespace App\Contracts\Repository;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function index(): object;
    public function search(string $type): object;
    public function show(int $id): ?Product;
    public function create(array $data): Product;
    public function update(array $data, Product $product): Product;
    public function destroy(Product $product): void;
}