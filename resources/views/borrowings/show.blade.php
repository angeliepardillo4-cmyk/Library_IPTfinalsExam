@extends('layouts.app')
@section('title', 'Borrowing details')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="{{ route('borrowings.index') }}" class="small text-decoration-none">← Borrowings</a>
        <h1 class="h2 mt-2 mb-0 text-brown">Borrowing details</h1>
    </div>
    <a href="{{ route('borrowings.edit', $borrowing) }}" class="btn btn-warning">Edit</a>
</div>
<div class="card border-0 shadow-sm bg-white-card mb-4">
    <div class="card-header bg-white py-3">
        <h2 class="h5 mb-0">Borrowing information</h2>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="small text-secondary">Book</div>
                <div><a href="{{ route('books.show', $borrowing->book) }}" class="text-brown fw-semibold">{{ $borrowing->book->title }}</a></div>
            </div>
            <div class="col-md-6">
                <div class="small text-secondary">Member</div>
                <div><a href="{{ route('members.show', $borrowing->member) }}" class="text-brown">{{ $borrowing->member->full_name }}</a></div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Borrow date</div>
                <div>{{ $borrowing->borrow_date->format('M j, Y') }}</div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Due date</div>
                <div>{{ $borrowing->due_date->format('M j, Y') }}</div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Return date</div>
                <div>{{ $borrowing->return_date?->format('M j, Y') ?? 'Not yet returned' }}</div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Status</div>
                <div>
                    <span class="badge {{ $borrowing->status === 'Borrowed' ? 'text-bg-warning' : ($borrowing->status === 'Overdue' ? 'text-bg-danger' : 'text-bg-success') }}">
                        {{ $borrowing->status }}
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Author</div>
                <div>{{ $borrowing->book->author->name ?? '—' }}</div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Category</div>
                <div>{{ $borrowing->book->category->name ?? '—' }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
