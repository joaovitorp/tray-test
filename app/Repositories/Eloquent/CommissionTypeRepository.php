<?php

namespace App\Repositories\Eloquent;

use App\Models\CommissionType;
use App\Http\Resources\CommissionTypeResource;
use App\Repositories\Contracts\CommissionTypeRepositoryInterface;

class CommissionTypeRepository implements CommissionTypeRepositoryInterface
{
    protected $commissionTypeModel;

    public function __construct(CommissionType $commissionTypeModel)
    {
        $this->commissionTypeModel = $commissionTypeModel;
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
