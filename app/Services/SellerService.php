<?php

namespace App\Services;

use App\Repositories\Contracts\CommissionTypeRepositoryInterface;
use App\Repositories\Contracts\SellerRepositoryInterface;

class SellerService
{
    public function __construct(
        protected SellerRepositoryInterface $sellerRepository,
        protected CommissionTypeRepositoryInterface $commissionTypeRepository
    ) {
    }

    public function index()
    {
        return $this->sellerRepository->getAllSellers();
    }

    public function store(array $data)
    {
        return $this->sellerRepository->createSeller([
            'name' => $data['name'],
            'email' => $data['email'],
            'commission_type_id' => $this->commissionTypeRepository->findCommissionDefaultId()
        ]);
    }
}
