@extends('layouts.app')
@section('title', 'Edit category')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm bg-white-card">
            <div class="card-header bg-white py-3">
                <h1 class="h4 mb-0 text-brown">Edit category</h1>
            </div>
            <div class="card-body p-4">
                @include('shared.errors')
                <form action="{{ route('categories.update', $category) }}" method="POST">
                    @csrf @method('PUT')
                    @include('categories._form')
                    <div class="d-flex gap-2 mt-4">
                        <button class="btn btn-primary">Update category</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
