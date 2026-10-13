<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'author_id' => Author::factory(),
            'title' => fake()->sentence(3, true),
            'isbn' => fake()->unique()->isbn13(),
            'published_date' => fake()->dateTimeBetween('-50 years', 'now')->format('Y-m-d'),
            'pages' => fake()->numberBetween(50, 1000),
            'quantity' => fake()->numberBetween(1, 10),
            'description' => fake()->optional()->paragraph(),
        ];
    }
}
