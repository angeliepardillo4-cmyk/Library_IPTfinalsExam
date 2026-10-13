@extends('layouts.app')
@section('title', 'Edit borrowing')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card border-0 shadow-sm bg-white-card">
            <div class="card-header bg-white py-3">
                <h1 class="h4 mb-0 text-brown">Edit borrowing</h1>
            </div>
            <div class="card-body p-4">
                @include('shared.errors')
                <form action="{{ route('borrowings.update', $borrowing) }}" method="POST">
                    @csrf @method('PUT')
                    @include('borrowings._form')
                    <div class="d-flex gap-2 mt-4">
                        <button class="btn btn-primary">Update borrowing</button>
                        <a href="{{ route('borrowings.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
