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
        $this->post('/api/sellers', $sellerPayload)->assertStatus(201)
            ->assertValid()
            ->assertJsonStructure([
                'id',
                'name',
                'email',
                'total_commission'
            ]);

        $this->assertDatabaseHas('sellers', $sellerPayload);
    }

    public function testCreateSellerIfEmailExists()
    {
        $seller = Seller::factory()->create();
        $this->post('/api/sellers', [
            'name' => $this->faker->name(),
            'email' => $seller->email
        ])->assertInvalid();
    }

    public function testCreateSellerInvalidPayload()
    {
        $this->post('/api/sellers', [
            'name' => $this->faker->name(),
            'email' => $this->faker->name()
        ])->assertInvalid();
    }
}
