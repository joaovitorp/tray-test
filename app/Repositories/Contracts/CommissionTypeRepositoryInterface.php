<?php

namespace App\Repositories\Contracts;

use App\Http\Resources\CommissionTypeResource;

interface CommissionTypeRepositoryInterface
{
    public function create(string $name, float $percentage, bool $default): CommissionTypeResource;
    public function findCommissionDefaultId(): int;
}
