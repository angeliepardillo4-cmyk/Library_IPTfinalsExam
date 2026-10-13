@extends('layouts.app')
@section('title', $member->full_name)
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="{{ route('members.index') }}" class="small text-decoration-none">← Members</a>
        <h1 class="h2 mt-2 mb-0 text-brown">{{ $member->full_name }}</h1>
    </div>
    <a href="{{ route('members.edit', $member) }}" class="btn btn-warning">Edit member</a>
</div>
<div class="card border-0 shadow-sm bg-white-card mb-4">
    <div class="card-header bg-white py-3">
        <h2 class="h5 mb-0">Member information</h2>
    </div>
    <div class="card-body">
        <div class="row g-3">
            @foreach([
                ['Member ID', $member->member_id_number],
                ['Date of birth', $member->date_of_birth?->format('M j, Y') ?? '—'],
                ['Gender', $member->gender ?? '—'],
                ['Contact number', $member->contact_number ?? '—'],
                ['Email', $member->email ?? '—'],
                ['Address', $member->address ?? '—'],
                ['Joined on', $member->joined_at?->format('M j, Y') ?? '—'],
            ] as [$label, $value])
                <div class="col-md-6">
                    <div class="small text-secondary">{{ $label }}</div>
                    <div>{{ $value }}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="card border-0 shadow-sm bg-white-card">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h2 class="h5 mb-0">Borrowing history</h2>
        <a href="{{ route('borrowings.create', ['member_id' => $member->id]) }}" class="btn btn-sm btn-primary">New borrowing</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Book</th>
                    <th>Borrow date</th>
                    <th>Due date</th>
                    <th>Return date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($member->borrowings as $borrowing)
                    <tr>
                        <td><a href="{{ route('borrowings.show', $borrowing) }}">{{ $borrowing->book->title }}</a></td>
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
