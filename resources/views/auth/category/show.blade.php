@extends('layout.master')
@section('title', 'Category Details')
@section('content')
    <div class="col-md-5 mx-auto my-5 card p-4">
        <div class="card-header">
            <h3 class="card-title text-center">{{ $category->name }}</h3>
        </div>

        <div class="card-body">
            <div class="form-group">
                <label class="fw-semibold">Category Name</label>
                <p>{{ $category->name }}</p>
            </div>
        </div>

        <div class="card-footer text-center">
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
@endsection
