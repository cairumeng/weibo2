@extends('layouts.default')
@section('content')
<h1>{{$user->name}}'s Followings</h1>
<hr>
@foreach ($followings as $following)
<div class="follow-info row">
    <div class="col-md-5">
        <img src="{{$following->avatar}}" alt="{{$following->name}}">
        <span>
            {{$following->name}}
        </span>
    </div>
    <div class="col-md-1">
        <form action="" class="d-inline">
            @if($following->isfollowing($user->id))
            <button class="btn btn-danger">Unfollow</button>
            @else
            <button class="btn btn-danger">Follow</button>
            @endif
        </form>
    </div>
</div>
@endforeach
@stop