@extends('layout.master')
@section('title', 'Login')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto my-5 card p-4">
                <div class="panel panel-default">
                    <div class="panel-heading my-3">
                        <h3 class="panel-title text-center">Login Page</h3>
                    </div>
                    <div class="panel-body px-3">
                        <form method="POST" action="{{ route('login.process') }}">
                            {{ csrf_field() }}
                            <div class="d-flex flex-column gap-4">
                                <div class="form-group
                            ">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>
                                <div class="form-group
                            ">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary w-100">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
