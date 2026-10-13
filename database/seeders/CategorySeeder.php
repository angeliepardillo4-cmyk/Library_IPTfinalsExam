<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        if (! Category::query()->exists()) {
            $defaultCategories = [
                ['name' => 'Fiction', 'description' => 'Fictional literature and novels.'],
                ['name' => 'Non-Fiction', 'description' => 'Factual and informational books.'],
                ['name' => 'Science', 'description' => 'Scientific and technical literature.'],
                ['name' => 'History', 'description' => 'Historical books and accounts.'],
                ['name' => 'Biography', 'description' => 'Biographies and memoirs.'],
                ['name' => 'Technology', 'description' => 'Computer science and technology.'],
                ['name' => 'Children', 'description' => 'Books for children and young readers.'],
                ['name' => 'Business', 'description' => 'Business, economics, and entrepreneurship.'],
            ];

            foreach ($defaultCategories as $category) {
                Category::firstOrCreate(['name' => $category['name']], $category);
            }

            Category::factory(4)->create();
        }
    }
}
