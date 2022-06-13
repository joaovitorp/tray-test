<?php

namespace App\Factories;

use App\Strategies\CommissionInterface;
use App\Strategies\CommissionPercentageStrategy;
use Exception;

class CommissionFactory
{
    public array $strategies = [
        "percentage" => CommissionPercentageStrategy::class
    ];

    public function getCommision(string $typeCommissionStrategy): CommissionInterface
    {
        if (array_key_exists($typeCommissionStrategy, $this->strategies)) {
            return new $this->strategies[$typeCommissionStrategy]();
        }

        throw new Exception('Commission Strategy not found');
    }
}
