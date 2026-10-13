@extends('layouts.app')
@section('title', 'Borrowings')
@section('content')
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
    <div>
        <h1 class="h2 mb-1">Borrowings</h1>
        <p class="text-secondary mb-0">Track all book borrowing activity.</p>
    </div>
    <a href="{{ route('borrowings.create') }}" class="btn btn-primary">+ New borrowing</a>
</div>
<div class="card border-0 shadow-sm bg-white-card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Book</th>
                    <th>Member</th>
                    <th>Borrow date</th>
                    <th>Due date</th>
                    <th>Return date</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($borrowings as $borrowing)
                    <tr>
                        <td><a href="{{ route('books.show', $borrowing->book) }}" class="fw-semibold text-decoration-none text-brown">{{ $borrowing->book->title }}</a></td>
                        <td>{{ $borrowing->member->full_name }}</td>
                        <td>{{ $borrowing->borrow_date->format('M j, Y') }}</td>
                        <td>{{ $borrowing->due_date->format('M j, Y') }}</td>
                        <td>{{ $borrowing->return_date?->format('M j, Y') ?? '—' }}</td>
                        <td>
                            <span class="badge {{ $borrowing->status === 'Borrowed' ? 'text-bg-warning' : ($borrowing->status === 'Overdue' ? 'text-bg-danger' : 'text-bg-success') }}">
                                {{ $borrowing->status }}
                            </span>
                        </td>
                        <td class="text-end text-nowrap">
                            <a href="{{ route('borrowings.show', $borrowing) }}" class="btn btn-sm btn-outline-secondary">View</a>
                            <a href="{{ route('borrowings.edit', $borrowing) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('borrowings.destroy', $borrowing) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this borrowing record?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-secondary py-5">No borrowings recorded yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
