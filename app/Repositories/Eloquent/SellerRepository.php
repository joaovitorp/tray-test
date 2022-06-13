<?php

namespace App\Repositories\Eloquent;

use App\Http\Resources\SellerCollection;
use App\Http\Resources\SellerResource;
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

    public function getAllSellers(): SellerCollection
    {
        return new SellerCollection($this->sellerModel->with('commissionType:id,name,value')->get());
    }

    public function createSeller(array $data): SellerResource
    {
        return new SellerResource($this->sellerModel->create($data));
    }

    public function getAllSellersAndSumSalesTotal(): Collection
    {
        return $this->sellerModel->selectRaw('sellers.*, SUM(sales.total) as total_sales')
            ->join('sales', 'sellers.id', '=', 'sales.seller_id')
            ->whereDate('sales.created_at', now()->today())
            ->groupBy('sales.seller_id')
            ->get();
    }

    public function findCommissionTypePercentageSellerId(int $sellerId): float
    {
        return $this->sellerModel->selectRaw('commission_types.value')
        ->join('commission_types', 'sellers.commission_type_id', '=', 'commission_types.id')
        ->first()
        ->value;
    }
}
