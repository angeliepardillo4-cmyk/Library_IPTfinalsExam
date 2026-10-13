@extends('layouts.app')
@section('title', 'Categories')
@section('content')
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
    <div>
        <h1 class="h2 mb-1">Categories</h1>
        <p class="text-secondary mb-0">Organize books by genre and subject.</p>
    </div>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Add category</a>
</div>
<div class="card border-0 shadow-sm bg-white-card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Category</th>
                    <th class="text-end">Books</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td><a href="{{ route('categories.show', $category) }}" class="fw-semibold text-decoration-none text-brown">{{ $category->name }}</a></td>
                        <td class="text-end">{{ $category->books_count }}</td>
                        <td class="text-end text-nowrap">
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this category? Categories with books cannot be deleted.')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center text-secondary py-5">No categories yet. Add your first category.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
