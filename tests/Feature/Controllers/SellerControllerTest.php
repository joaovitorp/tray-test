<?php

namespace Tests\Feature\Controllers;

use App\Models\Sale;
use App\Models\Seller;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class SellerControllerTest extends TestCase
{
    use WithFaker;

    public function testGetAllSellers()
    {
        $seller = Seller::factory()
        ->has(Sale::factory()->count(10))
        ->create();

        $this->get('/api/sellers')
        ->assertStatus(200)
        ->assertJsonCount($seller->count());
    }

    public function testCreateSeller()
    {
        $sellerPayload = [
            'name' => $this->faker->name(),
            'email' => $this->faker->email()
        ];
        $this->post('/api/sellers', $sellerPayload)->assertStatus(201);
        $this->assertDatabaseHas('sellers', $sellerPayload);
    }

}
