@extends('layouts.app')
@section('title', 'Books')
@section('content')
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
        <div>
            <h1 class="h2 mb-1">Books</h1>
            <p class="text-secondary mb-0">Browse and manage the library collection.</p>
        </div>
        <a href="{{ route('books.create') }}" class="btn btn-primary">+ Add book</a>
    </div>
    <div class="card border-0 shadow-sm bg-white-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>ISBN</th>
                        <th>Quantity</th>
                        <th>Available</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                        <tr>
                            <td><a href="{{ route('books.show', $book) }}"
                                    class="fw-semibold text-decoration-none text-brown">{{ $book->title }}</a></td>
                            <td>{{ $book->author->name ?? '—' }}</td>
                            <td>{{ $book->category->name ?? '—' }}</td>
                            <td>{{ $book->isbn ?? '—' }}</td>
                            <td>{{ $book->quantity }}</td>
                            <td>{{ $book->quantity - $book->borrowings_count }}</td>
                            <td class="text-end text-nowrap">
                                <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this book? Books with borrowings cannot be deleted.')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-secondary py-5">No books yet. Add your first book.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection