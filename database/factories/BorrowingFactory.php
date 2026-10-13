<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class BorrowingFactory extends Factory
{
    public function definition(): array
    {
        $statuses = ['Borrowed', 'Returned', 'Overdue'];

        return [
            'book_id' => Book::factory(),
            'member_id' => Member::factory(),
            'borrow_date' => fake()->dateTimeBetween('-60 days', 'now')->format('Y-m-d'),
            'due_date' => fake()->dateTimeBetween('+1 day', '+30 days')->format('Y-m-d'),
            'return_date' => fake()->boolean(30) ? fake()->dateTimeBetween('-30 days', 'now')->format('Y-m-d') : null,
            'status' => fake()->randomElement($statuses),
        ];
    }
}
