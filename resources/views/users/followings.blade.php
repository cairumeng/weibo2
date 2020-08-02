@extends('layouts.default')
@section('content')
<h1>{{$user->name}}'s Followings</h1>
<hr>
@foreach ($followings as $following)
<div class="follow-info row">
    <div class="col-md-5">
        <a href="{{ route('users.show', $following)}}">
            <img src="{{$following->avatar}}" alt="{{$following->name}}">
            <span>
                {{$following->name}}
            </span>
        </a>
    </div>
    <div class="col-md-1">
        @if(Auth::check())
        @if($user->isfollowing($following->id))
        <form method="POST" action="{{route('followers.destroy', $following)}}" class="d-inline">
            @csrf
            {{method_field('DELETE')}}
            <button class="btn btn-success">unfollow</button>
        </form>
        @else
        <form method="POST" action="{{route('followers.store', $following)}}" class="d-inline">
            @csrf
            <button class="btn btn-danger">follow</button>
        </form>
        @endif
        @endif
    </div>
</div>
@endforeach
<div class="">
    {{ $followings->links() }}
</div>

@stop