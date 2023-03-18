<?php

namespace App\Contracts;


interface ProductServiceInterface
{
    public function index(): array;
    public function search(string $type): array;
    public function create(array $data): array;
    public function update(array $data, int $id): array;
    public function destroy(int $id): array;
}