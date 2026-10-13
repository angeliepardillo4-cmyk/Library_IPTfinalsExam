<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;
use Illuminate\Database\Seeder;

class BorrowingSeeder extends Seeder
{
    public function run(): void
    {
        if (Borrowing::query()->exists()) {
            return;
        }

        $books = Book::all();
        $members = Member::all();

        foreach (range(0, 11) as $index) {
            $borrowed = ($index % 3) !== 2;
            $status = $borrowed ? 'Borrowed' : 'Returned';

            Borrowing::factory()->create([
                'book_id' => $books[$index % $books->count()]->id,
                'member_id' => $members[$index % $members->count()]->id,
                'borrow_date' => now()->subDays($index + 1),
                'due_date' => now()->addDays(7),
                'return_date' => $borrowed ? null : now()->subDays($index),
                'status' => $status,
            ]);
        }
    }
}
