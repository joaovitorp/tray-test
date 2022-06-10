<?php

namespace App\Repositories\Contracts;

use App\Http\Resources\SellerCollection;
use App\Http\Resources\SellerResource;

interface SellerRepositoryInterface
{
    public function getAllSellers(): SellerCollection;
    public function createSeller(array $data): SellerResource;
}
