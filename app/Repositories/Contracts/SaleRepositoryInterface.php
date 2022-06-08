<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface SaleRepositoryInterface
{
    public function saveSellerSale(array $data) : Collection;
}
