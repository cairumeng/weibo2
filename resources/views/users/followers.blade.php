@extends('layouts.default')
@section('content')
<h1>{{$user->name}}'s Followers</h1>
<hr>
@foreach ($followers as $follower)
<div class="follow-info row">
    <div class="col-md-5">
        <img src="{{$follower->avatar}}" alt="{{$follower->name}}">
        <span>
            {{$follower->name}}
        </span>
    </div>
    <div class="col-md-1">
        <form action="" class="d-inline">
            @if($follower->isfollowing($user->id))
            <button class="btn btn-danger">Unfollow</button>
            @else
            <button class="btn btn-danger">Follow</button>
            @endif
        </form>
    </div>
</div>
@endforeach
@stop