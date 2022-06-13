<?php

namespace Tests\Unit\Factories;

use PHPUnit\Framework\TestCase;
use App\Factories\CommissionFactory;
use App\Strategies\CommissionPercentageStrategy;
use Exception;

class CommissionFactoryTest extends TestCase
{

    public function testFactoryReturnCommissionPercentageStrategy()
    {
        $commissionFactory = new CommissionFactory();
        $this->assertInstanceOf(CommissionPercentageStrategy::class, $commissionFactory->getCommision('percentage'));
    }

    public function testFactoryCommissionInstanceException()
    {
        $commissionFactory = new CommissionFactory();

        $this->expectException(Exception::class);
        $commissionFactory->getCommision('john doe');
    }
}
