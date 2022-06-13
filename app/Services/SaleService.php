<?php

namespace App\Services;

use App\Factories\CommissionFactory;
use App\Http\Resources\SaleCollection;
use App\Http\Resources\SaleResource;
use App\Repositories\Contracts\SaleRepositoryInterface;
use App\Repositories\Contracts\SellerRepositoryInterface;

class SaleService
{
    protected SaleRepositoryInterface $saleRepository;
    protected SellerRepositoryInterface $sellerRepository;

    public function __construct(
        SaleRepositoryInterface $saleRepository,
        SellerRepositoryInterface $sellerRepository
    ) {
        $this->saleRepository = $saleRepository;
        $this->sellerRepository = $sellerRepository;
    }

    private function calculateCommissionByPercentage(float $total, float $percentage): float
    {
        return $total * ($percentage / 100);
    }

    public function showSalesBySellerId(int $sellerId): SaleCollection
    {
        return $this->saleRepository->getAllSalesBySellerId($sellerId);
    }

    public function launchNewSaleToSeller(array $salePayload): SaleResource
    {
        $totalCommission = $this->calculateCommissionByPercentage(
            $salePayload['total'],
            $this->sellerRepository->findCommissionTypePercentageSellerId($salePayload['seller_id'])
        );

        return $this->saleRepository->saveSellerSale([
            'commission' => $totalCommission,
            'total' => $salePayload['total'],
            'seller_id' => $salePayload['seller_id'],
        ]);
    }
}
