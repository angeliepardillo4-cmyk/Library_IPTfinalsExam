<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BorrowingController extends Controller
{
    private const STATUSES = ['Borrowed', 'Returned', 'Overdue'];

    public function index(): View
    {
        return view('borrowings.index', ['borrowings' => Borrowing::with('book.author', 'member')->orderByDesc('borrow_date')->get()]);
    }

    public function create(Request $request): View
    {
        return view('borrowings.create', $this->formData() + [
            'selectedBookId' => $request->query('book_id'),
            'selectedMemberId' => $request->query('member_id'),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules());

        $book = Book::findOrFail($validated['book_id']);

        if ($book->quantity - $book->borrowings()->whereIn('status', ['Borrowed', 'Overdue'])->count() < 1) {
            return back()->withInput()->withErrors(['book_id' => 'This book is currently not available.']);
        }

        Borrowing::create($validated);

        return to_route('borrowings.index')->with('success', 'Borrowing recorded successfully.');
    }

    public function show(Borrowing $borrowing): View
    {
        $borrowing->load('book.author', 'book.category', 'member');

        return view('borrowings.show', compact('borrowing'));
    }

    public function edit(Borrowing $borrowing): View
    {
        return view('borrowings.edit', ['borrowing' => $borrowing] + $this->formData());
    }

    public function update(Request $request, Borrowing $borrowing): RedirectResponse
    {
        $borrowing->update($request->validate($this->rules()));

        return to_route('borrowings.index')->with('success', 'Borrowing updated successfully.');
    }

    public function destroy(Borrowing $borrowing): RedirectResponse
    {
        $borrowing->delete();

        return to_route('borrowings.index')->with('success', 'Borrowing deleted successfully.');
    }

    private function formData(): array
    {
        return [
            'books' => Book::with('author')->orderBy('title')->get(),
            'members' => Member::orderBy('full_name')->get(),
            'statuses' => self::STATUSES,
        ];
    }

    private function rules(): array
    {
        return [
            'book_id' => ['required', 'exists:books,id'],
            'member_id' => ['required', 'exists:members,id'],
            'borrow_date' => ['required', 'date', 'before_or_equal:today'],
            'due_date' => ['required', 'date', 'after:borrow_date'],
            'return_date' => ['nullable', 'date', 'after_or_equal:borrow_date'],
            'status' => ['required', Rule::in(self::STATUSES)],
        ];
    }
}
