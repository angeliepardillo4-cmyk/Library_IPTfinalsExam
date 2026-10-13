<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        if (! Author::query()->exists()) {
            Author::factory(12)->create();
        }
    }
}
