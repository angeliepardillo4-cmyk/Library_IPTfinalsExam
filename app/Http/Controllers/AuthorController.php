<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AuthorController extends Controller
{
    public function index(): View
    {
        return view('authors.index', ['authors' => Author::withCount('books')->orderBy('name')->get()]);
    }

    public function create(): View
    {
        return view('authors.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Author::create($request->validate($this->rules()));

        return to_route('authors.index')->with('success', 'Author added successfully.');
    }

    public function show(Author $author): View
    {
        $author->load('books.category');

        return view('authors.show', compact('author'));
    }

    public function edit(Author $author): View
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author): RedirectResponse
    {
        $author->update($request->validate($this->rules($author)));

        return to_route('authors.index')->with('success', 'Author updated successfully.');
    }

    public function destroy(Author $author): RedirectResponse
    {
        if ($author->books()->exists()) {
            return to_route('authors.index')->with('error', 'This author has books and cannot be deleted.');
        }

        $author->delete();

        return to_route('authors.index')->with('success', 'Author deleted successfully.');
    }

    private function rules(?Author $author = null): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255', Rule::unique('authors', 'email')->ignore($author)],
            'phone' => ['nullable', 'string', 'max:50'],
            'bio' => ['nullable', 'string', 'max:5000'],
        ];
    }
}
