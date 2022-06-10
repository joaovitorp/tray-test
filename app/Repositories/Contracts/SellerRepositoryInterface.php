<?php

namespace App\Repositories\Contracts;

interface SellerRepositoryInterface
{
    public function getAllSellers(): array;
    public function createSeller(array $data): array;
}
