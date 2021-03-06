<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Repositories\Contracts\CommissionTypeRepositoryInterface;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seller>
 */
class SellerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email(),
            'commission_type_id' => app(CommissionTypeRepositoryInterface::class)->findCommissionDefaultId()
        ];
    }
}
