<?php

namespace App\Repositories\Eloquent;

use App\Models\CommissionType;
use App\Http\Resources\CommissionTypeResource;
use App\Repositories\Contracts\CommissionTypeRepositoryInterface;

class CommissionTypeRepository implements CommissionTypeRepositoryInterface
{
    public function __construct(protected CommissionType $commissionTypeModel)
    {
    }

    public function create(string $name, float $percentage, bool $default): CommissionTypeResource
    {
        $commissionType = $this->commissionTypeModel->firstOrCreate([
            'name' => $name,
            'value' => $percentage,
            'default' => $default
        ]);
        return new CommissionTypeResource($commissionType->toArray());
    }

    public function findCommissionDefaultId(): int
    {
        return $this->commissionTypeModel->where('default', true)->firstOrFail()->getKey();
    }
}
