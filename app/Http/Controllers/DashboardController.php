<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Category;
use App\Models\Member;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard', [
            'authorCount' => Author::count(),
            'categoryCount' => Category::count(),
            'bookCount' => Book::count(),
            'memberCount' => Member::count(),
            'borrowingCount' => Borrowing::where('status', 'Borrowed')->count(),
            'overdueBorrows' => Borrowing::with('book', 'member')
                ->where('status', 'Overdue')
                ->orderBy('due_date')
                ->take(6)
                ->get(),
            'recentBorrowings' => Borrowing::with('book', 'member')
                ->orderByDesc('borrow_date')
                ->take(8)
                ->get(),
        ]);
    }
}
