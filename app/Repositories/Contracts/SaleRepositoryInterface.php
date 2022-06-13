<?php

namespace App\Repositories\Contracts;

use App\Http\Resources\SaleResource;
use App\Http\Resources\SaleCollection;

interface SaleRepositoryInterface
{
    public function saveSellerSale(array $data): SaleResource;
    public function getAllSalesBySellerId(int $sellerId): SaleCollection;
}
