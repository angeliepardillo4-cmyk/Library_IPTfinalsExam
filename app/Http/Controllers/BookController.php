<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        return view('books.index', ['books' => Book::with('author', 'category')->withCount('borrowings')->orderBy('title')->get()]);
    }

    public function create(): View
    {
        return view('books.create', $this->formData());
    }

    public function store(Request $request): RedirectResponse
    {
        Book::create($request->validate($this->rules()));

        return to_route('books.index')->with('success', 'Book added successfully.');
    }

    public function show(Book $book): View
    {
        $book->load('author', 'category', 'borrowings.member');

        return view('books.show', compact('book'));
    }

    public function edit(Book $book): View
    {
        return view('books.edit', ['book' => $book] + $this->formData());
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        $book->update($request->validate($this->rules($book)));

        return to_route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book): RedirectResponse
    {
        if ($book->borrowings()->exists()) {
            return to_route('books.index')->with('error', 'This book has borrowings and cannot be deleted.');
        }

        $book->delete();

        return to_route('books.index')->with('success', 'Book deleted successfully.');
    }

    private function formData(): array
    {
        return [
            'authors' => Author::orderBy('name')->get(),
            'categories' => Category::orderBy('name')->get(),
        ];
    }

    private function rules(?Book $book = null): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'author_id' => ['required', 'exists:authors,id'],
            'title' => ['required', 'string', 'max:255'],
            'isbn' => ['nullable', 'string', 'max:255', Rule::unique('books', 'isbn')->ignore($book)],
            'published_date' => ['nullable', 'date'],
            'pages' => ['nullable', 'integer', 'min:1', 'max:10000'],
            'quantity' => ['required', 'integer', 'min:1', 'max:1000'],
            'description' => ['nullable', 'string', 'max:5000'],
        ];
    }
}
