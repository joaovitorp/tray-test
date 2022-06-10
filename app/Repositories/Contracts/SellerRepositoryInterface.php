<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface SellerRepositoryInterface
{
    public function getAllSellers();
    public function createSeller(string $name, string $email): Collection;
}
