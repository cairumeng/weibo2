@extends('layouts.default')
@section('content')
<h1>{{$user->name}}'s Followers</h1>
<hr>
@foreach ($followers as $follower)
<div class="follow-info row">
    <div class="col-md-5">
        <a href="{{ route('users.show', $follower)}}">
            <img src="{{$follower->avatar}}" alt="{{$follower->name}}">
            <span>
                {{$follower->name}}
            </span>
        </a>
    </div>
    <div class="col-md-1">
        @if($user->isfollowing($follower->id))
        <form method="POST" action="{{route('followers.destroy', $follower)}}" class="d-inline">
            @csrf
            {{method_field('DELETE')}}
            <button class="btn btn-success">unfollow</button>
        </form>
        @else
        <form method="POST" action="{{route('followers.store', $follower)}}" class="d-inline">
            @csrf
            <button class="btn btn-danger">follow</button>
        </form>
        @endif
    </div>
</div>
@endforeach

<div class="">
    {{ $followers->links() }}
</div>

@stop