<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        if (! Book::query()->exists()) {
            $authors = Author::all();
            $categories = Category::all();

            if ($authors->isEmpty() || $categories->isEmpty()) {
                return;
            }

            foreach (range(1, 20) as $index) {
                Book::factory()->create([
                    'author_id' => $authors[$index % $authors->count()]->id,
                    'category_id' => $categories[$index % $categories->count()]->id,
                ]);
            }
        }
    }
}
