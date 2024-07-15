@extends('layout.master')
@section('title', 'Product Management')
@section('content')
    <div class="d-flex justify-content-between mb-4">
        <h4>Product Management</h4>
        <div id="create-product">
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary ">Create Product</a>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ Str::limit($product->description, 50) }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
