<?php

namespace Database\Seeders;

use App\Repositories\Contracts\CommissionTypeRepositoryInterface;
use Illuminate\Database\Seeder;

class CommissionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commissionTypeRepository = app(CommissionTypeRepositoryInterface::class);
        $commissionTypeRepository->create('seller-default', 8.5, true);
    }
}
