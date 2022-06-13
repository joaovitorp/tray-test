<?php

namespace App\Repositories\Contracts;

use App\Http\Resources\SellerCollection;
use App\Http\Resources\SellerResource;
use Illuminate\Support\Collection;

interface SellerRepositoryInterface
{
    public function getAllSellers(): SellerCollection;
    public function createSeller(array $data): SellerResource;
    public function getAllSellersAndSumSalesTotal(): Collection;
    public function findCommissionTypePercentageSellerId(int $sellerId): float;
}
