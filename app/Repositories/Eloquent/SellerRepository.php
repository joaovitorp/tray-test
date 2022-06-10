<?php

namespace App\Repositories\Eloquent;

use App\Models\Seller;
use App\Repositories\Contracts\SellerRepositoryInterface;
use Illuminate\Support\Collection;

class SellerRepository implements SellerRepositoryInterface
{
    protected $sellerModel;

    public function __construct(Seller $sellerModel)
    {
        $this->sellerModel = $sellerModel;
    }

    public function getAllSellers()
    {
        return $this->sellerModel->get();
    }

    public function createSeller(string $name, string $email) : Collection
    {
        return $this->sellerModel->create([
            "name" => $name,
            "email" => $email
        ]);
    }
}
