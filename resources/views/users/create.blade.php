@extends('layouts.default')
@section ('content')

<div class="offset-md-3 col-md-6">
    <div class="card">
        <div class="card-header">
            Sign up
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Password Confirmation</label>
                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
                </div>
                <button class="btn btn-block btn-success">Sign up </button>
            </form>
        </div>
    </div>

</div>
@stop