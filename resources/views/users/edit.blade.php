@extends('layouts.default')
@section ('content')
<div class="offset-md-3 col-md-6">
    <div id="avatar" class="text-center ">
        <img src="{{$user->avatar}}" alt="{{$user->name}}" class="">
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update',$user->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{ $user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email" value="{{ $user->email }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Password Confirmation</label>
                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
                </div>
                <button class="btn btn-block btn-success">Edit info </button>
            </form>
        </div>
    </div>

</div>
@stop