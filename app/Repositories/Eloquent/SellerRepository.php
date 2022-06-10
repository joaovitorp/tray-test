<?php

namespace App\Repositories\Eloquent;

use App\Http\Resources\SellerCollection;
use App\Http\Resources\SellerResource;
use App\Models\Seller;
use App\Repositories\Contracts\SellerRepositoryInterface;

class SellerRepository implements SellerRepositoryInterface
{
    protected $sellerModel;

    public function __construct(Seller $sellerModel)
    {
        $this->sellerModel = $sellerModel;
    }

    public function getAllSellers(): SellerCollection
    {
        return new SellerCollection($this->sellerModel->withSum('sales as total_commission', 'commission')->get());
    }

    public function createSeller(array $data): SellerResource
    {
        return new SellerResource($this->sellerModel->create($data));
    }
}
