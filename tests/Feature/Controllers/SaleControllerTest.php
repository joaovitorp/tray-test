<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Sale;
use App\Models\Seller;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SaleControllerTest extends TestCase
{

    use WithFaker;

    public function testGetAllSalesBySeller()
    {
        $seller = Seller::factory()
            ->has(Sale::factory()->count(10))
            ->create();

        $this->get('/api/sellers/' . $seller->id . '/sales')->assertStatus(200);
    }

    public function testGetAllSalesFromAWrongSeller()
    {
        $this->get('/api/sellers/invalid/sales')->assertInvalid();
    }

    public function testCreateNewSaleToSeller()
    {
        $seller = Seller::factory()->create();
        $totalSale = $this->faker->numberBetween(0, 20000);
        $this->post('/api/sellers/' . $seller->id . '/sales', [
            'total' => $totalSale
        ])->assertStatus(201);

        $this->assertDatabaseHas('sales', [
            "seller_id" => $seller->id,
            "total" => $totalSale
        ]);
    }

    public function testCreateNewSaleToWrongSeller()
    {
        $this->post('/api/sellers/invalid/sales', [
            'total' => $this->faker->numberBetween(0, 20000)
        ])->assertInvalid();
    }

    public function testCreateNewSaleToSellerWithInvalidValue()
    {
        $this->post('/api/sellers/invalid/sales', [
            'total' => $this->faker->name()
        ])->assertInvalid();
    }
}
