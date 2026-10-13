@extends('layouts.app')
@section('title', $book->title)
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="{{ route('books.index') }}" class="small text-decoration-none">← Books</a>
        <h1 class="h2 mt-2 mb-0 text-brown">{{ $book->title }}</h1>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
    </div>
</div>
<div class="card border-0 shadow-sm bg-white-card mb-4">
    <div class="card-header bg-white py-3">
        <h2 class="h5 mb-0">Book information</h2>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="small text-secondary">Author</div>
                <div><a href="{{ route('authors.show', $book->author) }}" class="text-brown">{{ $book->author->name ?? '—' }}</a></div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Category</div>
                <div>{{ $book->category->name ?? '—' }}</div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">ISBN</div>
                <div>{{ $book->isbn ?? '—' }}</div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Published date</div>
                <div>{{ $book->published_date?->format('M j, Y') ?? '—' }}</div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Pages</div>
                <div>{{ $book->pages ?? '—' }}</div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Quantity</div>
                <div>{{ $book->quantity }}</div>
            </div>
            <div class="col-md-6">
                <div class="small text-secondary">Available</div>
                <div class="fw-semibold">{{ $book->quantity - $book->borrowings->whereIn('status', ['Borrowed', 'Overdue'])->count() }}</div>
            </div>
            <div class="col-md-6">
                <div class="small text-secondary">Borrowed</div>
                <div class="fw-semibold">{{ $book->borrowings->whereIn('status', ['Borrowed', 'Overdue'])->count() }}</div>
            </div>
            <div class="col-12">
                <div class="small text-secondary">Description</div>
                <div>{{ $book->description ?? 'No description available.' }}</div>
            </div>
        </div>
    </div>
</div>
<div class="card border-0 shadow-sm bg-white-card">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h2 class="h5 mb-0">Borrowing history</h2>
        <a href="{{ route('borrowings.create', ['book_id' => $book->id]) }}" class="btn btn-sm btn-primary">Borrow</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Member</th>
                    <th>Borrow date</th>
                    <th>Due date</th>
                    <th>Return date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($book->borrowings as $borrowing)
                    <tr>
                        <td>{{ $borrowing->member->full_name }}</td>
                        <td>{{ $borrowing->borrow_date->format('M j, Y') }}</td>
                        <td>{{ $borrowing->due_date->format('M j, Y') }}</td>
                        <td>{{ $borrowing->return_date?->format('M j, Y') ?? '—' }}</td>
                        <td>{{ $borrowing->status }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-secondary py-4">No borrowings recorded.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
