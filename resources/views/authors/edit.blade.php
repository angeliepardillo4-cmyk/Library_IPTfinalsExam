@extends('layouts.app')
@section('title', 'Edit author')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm bg-white-card">
            <div class="card-header bg-white py-3">
                <h1 class="h4 mb-0 text-brown">Edit author</h1>
            </div>
            <div class="card-body p-4">
                @include('shared.errors')
                <form action="{{ route('authors.update', $author) }}" method="POST">
                    @csrf @method('PUT')
                    @include('authors._form')
                    <div class="d-flex gap-2 mt-4">
                        <button class="btn btn-primary">Update author</button>
                        <a href="{{ route('authors.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
