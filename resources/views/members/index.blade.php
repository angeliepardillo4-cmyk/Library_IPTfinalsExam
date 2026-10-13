@extends('layouts.app')
@section('title', 'Members')
@section('content')
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
    <div>
        <h1 class="h2 mb-1">Members</h1>
        <p class="text-secondary mb-0">Manage library member accounts.</p>
    </div>
    <a href="{{ route('members.create') }}" class="btn btn-primary">+ Add member</a>
</div>
<div class="card border-0 shadow-sm bg-white-card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Member</th>
                    <th>Member ID</th>
                    <th>Contact</th>
                    <th>Borrowings</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($members as $member)
                    <tr>
                        <td><a href="{{ route('members.show', $member) }}" class="fw-semibold text-decoration-none text-brown">{{ $member->full_name }}</a></td>
                        <td>{{ $member->member_id_number }}</td>
                        <td>{{ $member->contact_number ?: '—' }}</td>
                        <td>{{ $member->borrowings_count }}</td>
                        <td class="text-end text-nowrap">
                            <a href="{{ route('members.edit', $member) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('members.destroy', $member) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this member? Members with borrowings cannot be deleted.')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-secondary py-5">No members yet. Add your first member.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
