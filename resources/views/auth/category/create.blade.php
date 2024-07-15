@extends('layout.master')
@section('title', 'Category Management')
@section('content')
    <div class="col-md-5 mx-auto my-5 card p-4">
        <div class="panel-heading my-3">
            <h3 class="panel-title text-center">Create Category</h3>
        </div>

        <div class="panel-body px-3">
            <form method="POST" action="{{ route('categories.store') }}">
                {{ csrf_field() }}

                <div class="d-flex flex-column gap-4">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary w-100">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
