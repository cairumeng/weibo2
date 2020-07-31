@extends('layouts.default')
@section ('content')

<div class="offset-md-3 col-md-6">
    <div class="card">
        <div class="card-header">
            Login
        </div>
        <div class="card-body">
            <form action="{{ route('sessions.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}">
                    @if($errors->has('email'))
                    <div class="text-danger">{{$errors->get('email')[0]}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <span><a href="{{ route ('password.form') }}">(Forget your password?)</a> </span>
                    <input class="form-control" type="password" id="password" name="password">

                    @if($errors->has('password'))
                    <div class="text-danger">{{$errors->get('password')[0]}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="remember"><input type="checkbox" name="remember" id="remember">Remember Me</label>
                </div>

                <button class="btn btn-block btn-success">Login </button>
            </form>
        </div>
    </div>

</div>
@stop