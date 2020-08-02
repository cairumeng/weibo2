@extends('layouts.default')
@section('content')
<div class="row">
    <div class=" offset-md-1 col-md-6">
        <form method="POST" action="{{ route('statuses.store')}}" class="">
            @csrf
            <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="content"
                    placeholder="chat with others"></textarea>
            </div>
            <button class="btn btn-success float-right">Publish</button>
        </form>
        <div>
            <h1>POSTS</h1>
            <hr>
            @include('shared.feed',['feed_items'=>$feed_items])
        </div>
    </div>
    <div class="col-md-4 text-center">
        @include('shared.user_info', ['user'=>Auth::user()])
        @include('shared.follow_state',['user'=>Auth::user()])
    </div>


</div>

@stop