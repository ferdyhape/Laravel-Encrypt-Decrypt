@extends('layout.master')
@section('title', 'Category Management')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>Category Management</h4>
        <div id="create-category">
            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">Create Category</a>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $cateogry)
                <tr>
                    <td>{{ $cateogry->name }}</td>
                    <td>
                        <a href="{{ route('categories.show', $cateogry->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('categories.edit', $cateogry->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form method="POST" action="{{ route('categories.destroy', $cateogry->id) }}" class="d-inline">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
