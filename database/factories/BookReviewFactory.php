<?php

namespace Database\Factories;

use App\Models\BookReview;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BookReview>
 */
class BookReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => null,   // se asigna en seeder
            'member_id' => null, // se asigna en seeder
            'rating' => fake()->numberBetween(1, 5),
            'title' => fake()->sentence(),
            'body' => fake()->paragraph(),
        ];
    }
}
