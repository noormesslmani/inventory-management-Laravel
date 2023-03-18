<?php

namespace App\Contracts;

interface ItemServiceInterface
{
    public function index(int $product_id): array;
    public function search(int $product_id, string $serial_number): array;
    public function create(array $data): array;
    public function update(array $data, int $item_id): array;
    public function destroy(int $item_id): array;
}