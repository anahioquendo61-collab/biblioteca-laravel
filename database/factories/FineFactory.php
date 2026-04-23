<?php

namespace Database\Factories;

use App\Models\Fine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Fine>
 */
class FineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = fake()->randomElement(['pending', 'paid']);

        return [
            'loan_id' => null, // se asigna en seeder
            'amount' => fake()->randomFloat(2, 5, 50),
            'reason' => fake()->sentence(),
            'status' => $status,
            'paid_at' => $status === 'paid'
                ? fake()->dateTimeThisYear()
                : null,
        ];
    }
}
