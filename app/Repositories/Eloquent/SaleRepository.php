<?php

namespace App\Repositories\Eloquent;

use App\Http\Resources\SaleCollection;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use App\Repositories\Contracts\SaleRepositoryInterface;

class SaleRepository implements SaleRepositoryInterface
{
    public function __construct(protected Sale $saleModel)
    {
    }

    public function saveSellerSale(array $data): SaleResource
    {
        return new SaleResource($this->saleModel->create($data)->load('seller:id,name,email'));
    }

    public function getAllSalesBySellerId(int $sellerId): SaleCollection
    {
        return new SaleCollection($this->saleModel->with('seller:id,name,email')
            ->where(['seller_id' => $sellerId])
            ->get());
    }
}
