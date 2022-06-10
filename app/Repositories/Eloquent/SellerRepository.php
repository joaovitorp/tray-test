<?php

namespace App\Repositories\Eloquent;

use App\Models\Seller;
use App\Repositories\Contracts\SellerRepositoryInterface;

class SellerRepository implements SellerRepositoryInterface
{
    protected $sellerModel;

    public function __construct(Seller $sellerModel)
    {
        $this->sellerModel = $sellerModel;
    }

    public function getAllSellers(): array
    {
        return $this->sellerModel->withSum('sales', 'commission')->get()->toArray();
    }

    public function createSeller(array $data): array
    {
        return $this->sellerModel->create($data)->toArray();
    }
}
