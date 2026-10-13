@extends('layouts.app')
@section('title', $category->name)
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <a href="{{ route('categories.index') }}" class="small text-decoration-none">← Categories</a>
            <h1 class="h2 mt-2 mb-0 text-brown">{{ $category->name }}</h1>
        </div>
        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Edit category</a>
    </div>
    <div class="card border-0 shadow-sm bg-white-card mb-4">
        <div class="card-header bg-white py-3">
            <h2 class="h5 mb-0">Category Information</h2>
        </div>
        <div class="card-body">
            <div class="col-12">
                <div class="small text-secondary">Description</div>
                <div>{{ $category->description ?? 'No description available.' }}</div>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow-sm bg-white-card">
        <div class="card-header bg-white py-3">
            <h2 class="h5 mb-0">Books in this category</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($category->books as $book)
                        <tr>
                            <td><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></td>
                            <td>{{ $book->author->name ?? '—' }}</td>
                            <td>{{ $book->isbn ?? '—' }}</td>
                            <td>{{ $book->quantity }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-secondary py-4">No books in this category.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection