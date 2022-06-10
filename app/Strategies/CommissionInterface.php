<?php

namespace App\Strategies;

interface CommissionInterface
{
    public function calculate(float $valueToCalculate): ?float;
}
