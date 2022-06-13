<?php

namespace Tests\Feature\Commands;

use Tests\TestCase;
use App\Models\Sale;
use App\Models\Seller;
use App\Mail\SaleReportEmail;
use Illuminate\Support\Facades\Mail;

class EmailSalesReportSellerCommandTest extends TestCase
{
    public function testSendEmailSalesReportFromSeller()
    {
        Mail::fake();
        Seller::factory()
            ->has(Sale::factory()->count(10))
            ->create();
        $this->artisan('seller:emailSalesReport')->assertExitCode(1);
        Mail::assertSent(SaleReportEmail::class);
    }
}
