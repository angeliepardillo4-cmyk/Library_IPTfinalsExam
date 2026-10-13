@extends('layouts.app')
@section('title', $author->name)
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="{{ route('authors.index') }}" class="small text-decoration-none">← Authors</a>
        <h1 class="h2 mt-2 mb-0 text-brown">{{ $author->name }}</h1>
    </div>
    <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning">Edit author</a>
</div>
<div class="card border-0 shadow-sm bg-white-card mb-4">
    <div class="card-header bg-white py-3">
        <h2 class="h5 mb-0">Author information</h2>
    </div>
    <div class="card-body">
        <div class="row g-3">
            @foreach(['Email' => $author->email ?? '—', 'Phone' => $author->phone ?? '—'] as $label => $value)
                <div class="col-md-6">
                    <div class="small text-secondary">{{ $label }}</div>
                    <div>{{ $value }}</div>
                </div>
            @endforeach
            <div class="col-12">
                <div class="small text-secondary">Biography</div>
                <div>{{ $author->bio ?? 'None recorded' }}</div>
            </div>
        </div>
    </div>
</div>
<div class="card border-0 shadow-sm bg-white-card">
    <div class="card-header bg-white py-3">
        <h2 class="h5 mb-0">Books by this author</h2>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>ISBN</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @forelse($author->books as $book)
                    <tr>
                        <td><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></td>
                        <td>{{ $book->category->name ?? '—' }}</td>
                        <td>{{ $book->isbn ?? '—' }}</td>
                        <td>{{ $book->quantity }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-secondary py-4">No books recorded for this author.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
