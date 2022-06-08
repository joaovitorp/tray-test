<?php

namespace App\Repositories;

use App\Models\Sale;
use App\Repositories\Contracts\SaleRepositoryInterface;
use Illuminate\Support\Collection;

class SaleRepository implements SaleRepositoryInterface
{

    public function __construct(Sale $sale)
    {
        $this->saleModel = $sale;
    }

    public function saveSellerSale(array $data) : Collection
    {
        return $this->saleModel->create($data);
    }
}
