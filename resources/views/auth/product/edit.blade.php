@extends('layout.master')
@section('title', 'Product Management')
@section('content')
    <div class="col-md-5 mx-auto my-5 card p-4">
        <div class="panel-heading my-3">
            <h3 class="panel-title text-center">Edit Product</h3>
        </div>

        <div class="panel-body px-3">
            <form method="POST" action="{{ route('products.update', $product->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }} <!-- Use PUT method for update -->

                <div class="d-flex flex-column gap-4">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}"
                            required>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control"
                            value="{{ $product->price }}" required>
                        @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" required>{{ $product->description }}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
