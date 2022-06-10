<?php

namespace App\Services;

use App\Factories\CommissionFactory;
use App\Http\Resources\SaleCollection;
use App\Http\Resources\SaleResource;
use App\Repositories\Contracts\SaleRepositoryInterface;

class SaleService
{
    protected SaleRepositoryInterface $saleRepository;

    public function __construct(SaleRepositoryInterface $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    public function showSalesBySellerId(int $sellerId) : SaleCollection
    {
        return $this->saleRepository->getAllSalesBySellerId($sellerId);
    }

    public function launchNewSaleToSeller(array $salePayload) : SaleResource
    {
        $commissionFactory = new CommissionFactory();
        $totalCommission = $commissionFactory->getCommision('percentage')->calculate($salePayload['total']);

        return $this->saleRepository->saveSellerSale([
            'commission' => $totalCommission,
            'total' => $salePayload['total'],
            'seller_id' => $salePayload['seller_id'],
        ]);
    }
}
