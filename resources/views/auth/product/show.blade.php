@extends('layout.master')
@section('title', 'Product Details')
@section('content')
    <div class="col-md-5 mx-auto my-5 card p-4">
        <div class="card-header">
            <h3 class="card-title text-center">{{ $product->name }}</h3>
        </div>

        <div class="card-body">
            <div class="form-group">
                <label class="fw-semibold">Product Name</label>
                <p>{{ $product->name }}</p>
            </div>
            <div class="form-group">
                <label class="fw-semibold">Price</label>
                <p>{{ $product->price }}</p>
            </div>
            <div class="form-group">
                <label class="fw-semibold">Description</label>
                <p>{{ $product->description }}</p>
            </div>
            <div class="form-group">
                <label class="fw-semibold">Category</label>
                <p>{{ $product->category->name }}</p>
            </div>
        </div>

        <div class="card-footer text-center">
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
@endsection
