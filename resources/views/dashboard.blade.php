@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <p class="text-brown fw-semibold text-uppercase small mb-1">Library overview</p>
            <h1 class="h2 mb-1">Welcome to my Laravel Project</h1>
            <p class="text-secondary mb-0">Manage manually your books, authors, categories, members, and borrowings.</p>
        </div>
        <a href="{{ route('borrowings.create') }}" class="btn btn-primary">+ New borrowing</a>
    </div>
    <div class="row g-3 mb-4">
        @foreach([['Authors', $authorCount, 'authors.index', 'Total authors'], ['Categories', $categoryCount, 'categories.index', 'Book categories'], ['Books', $bookCount, 'books.index', 'Total books in stock'], ['Members', $memberCount, 'members.index', 'Registered members']] as [$label, $count, $route, $hint])
            <div class="col-12 col-sm-6 col-xl-3">
                <a href="{{ route($route) }}" class="text-decoration-none text-reset">
                    <div class="card border-0 shadow-sm h-100 bg-white-card">
                        <div class="card-body">
                            <div class="small text-secondary">{{ $label }}</div>
                            <div class="display-6 fw-semibold text-brown">{{ $count }}</div>
                            <div class="small text-secondary">{{ $hint }}</div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100 bg-white-card">
                <div class="card-body">
                    <div class="small text-secondary">Active borrowings</div>
                    <div class="display-6 fw-semibold text-brown mt-2">{{ $borrowingCount }}</div>
                    <a href="{{ route('borrowings.index') }}" class="small">View borrowings</a>
                </div>
            </div>
        </div>
    </div>

    @if($overdueBorrows->isNotEmpty())
        <div class="card border-0 shadow-sm bg-white-card">
            <div class="card-header bg-white py-3">
                <h2 class="h5 mb-0 text-brown">Overdue borrowings</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Book</th>
                            <th>Member</th>
                            <th>Due date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($overdueBorrows as $borrowing)
                            <tr>
                                <td>{{ $borrowing->book->title }}</td>
                                <td>{{ $borrowing->member->full_name }}</td>
                                <td>{{ $borrowing->due_date->format('M j, Y') }}</td>
                                <td><a href="{{ route('borrowings.show', $borrowing) }}"
                                        class="btn btn-sm btn-outline-secondary">Details</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-secondary py-4">No overdue items.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="card border-0 shadow-sm bg-white-card">
            <div class="card-header bg-white py-3">
                <h2 class="h5 mb-0 text-brown">Recent borrowings</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Book</th>
                            <th>Member</th>
                            <th>Borrow date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentBorrowings as $borrowing)
                            <tr>
                                <td>{{ $borrowing->book->title }}</td>
                                <td>{{ $borrowing->member->full_name }}</td>
                                <td>{{ $borrowing->borrow_date->format('M j, Y') }}</td>
                                <td>{{ $borrowing->status }}</td>
                                <td><a href="{{ route('borrowings.show', $borrowing) }}"
                                        class="btn btn-sm btn-outline-secondary">Details</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-secondary py-4">No borrowings recorded.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection