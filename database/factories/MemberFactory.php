<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    public function definition(): array
    {
        return [
            'member_id_number' => strtoupper(fake()->unique()->bothify('MB-####')),
            'full_name' => fake()->name(),
            'date_of_birth' => fake()->dateTimeBetween('-75 years', '-5 years')->format('Y-m-d'),
            'gender' => fake()->randomElement(['Female', 'Male', 'Other']),
            'contact_number' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'joined_at' => now()->toDateString(),
        ];
    }
}
