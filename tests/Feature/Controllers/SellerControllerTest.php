<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;

class SellerControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAllSellers()
    {
        $this->get('/api/sellers')->assertStatus(200);
    }
}
