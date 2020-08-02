@extends('layouts.default')
@section ('content')

<div class="offset-md-3 col-md-6">
    <div class="card">
        <div class="card-header">
            Forgot your password?
        </div>
        <div class="card-body">
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}">
                    @if($errors->has('email'))
                    <div class="text-danger">{{$errors->first('email')}}</div>
                    @endif
                </div>

                <button class="btn btn-block btn-success">Send password reset
                    link</button>
            </form>
        </div>
    </div>

</div>
@stop