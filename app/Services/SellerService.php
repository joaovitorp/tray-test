<?php

namespace App\Services;

use App\Repositories\Contracts\CommissionTypeRepositoryInterface;
use App\Repositories\Contracts\SellerRepositoryInterface;

class SellerService
{
    protected $sellerRepository;
    protected $commissionTypeRepository;

    public function __construct(
        SellerRepositoryInterface $sellerRepository,
        CommissionTypeRepositoryInterface $commissionTypeRepository
    ) {
        $this->sellerRepository = $sellerRepository;
        $this->commissionTypeRepository = $commissionTypeRepository;
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
