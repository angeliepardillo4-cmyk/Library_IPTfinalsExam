@extends('layouts.app')
@section('title', 'Add borrowing')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card border-0 shadow-sm bg-white-card">
            <div class="card-header bg-white py-3">
                <h1 class="h4 mb-0 text-brown">Record borrowing</h1>
            </div>
            <div class="card-body p-4">
                @include('shared.errors')
                @if($books->isEmpty() || $members->isEmpty())
                    <div class="alert alert-warning">
                        Add at least one book and one member before recording a borrowing.
                    </div>
                @endif
                <form action="{{ route('borrowings.store') }}" method="POST">
                    @csrf
                    @include('borrowings._form')
                    <div class="d-flex gap-2 mt-4">
                        <button class="btn btn-primary" @disabled($books->isEmpty() || $members->isEmpty())>Save borrowing</button>
                        <a href="{{ route('borrowings.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
