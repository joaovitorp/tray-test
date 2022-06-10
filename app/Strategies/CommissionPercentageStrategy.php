<?php

namespace App\Strategies;

class CommissionPercentageStrategy implements CommissionInterface
{
    protected $percentage = 8.5;

    public function calculate(float $valueToCalculate): ?float
    {
        return $valueToCalculate * $this->percentage / 100;
    }
}
