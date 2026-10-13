@extends('layouts.app')
@section('title', 'Authors')
@section('content')
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
    <div>
        <h1 class="h2 mb-1">Authors</h1>
        <p class="text-secondary mb-0">Manage book authors and their details.</p>
    </div>
    <a href="{{ route('authors.create') }}" class="btn btn-primary">+ Add author</a>
</div>
<div class="card border-0 shadow-sm bg-white-card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Books</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($authors as $author)
                    <tr>
                        <td><a href="{{ route('authors.show', $author) }}" class="fw-semibold text-decoration-none text-brown">{{ $author->name }}</a></td>
                        <td>{{ $author->email ?? '—' }}</td>
                        <td>{{ $author->phone ?? '—' }}</td>
                        <td>{{ $author->books_count }}</td>
                        <td class="text-end text-nowrap">
                            <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('authors.destroy', $author) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this author? Authors with books cannot be deleted.')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-secondary py-5">No authors yet. Add your first author.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
