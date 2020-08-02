@extends('layouts.default')
@section('content')
<div class="row">

    <div class="offset-md-2 col-md-8">
        <section class="user_info text-center mb-5">
            @include('shared.user_info')
            @include('shared.follow_state')
        </section>
        <section class="status">
            @if($statuses->count()>0)
            <ul class="list-unstyled">
                @foreach ($statuses as $status)
                @include('statuses.status')
                @endforeach
            </ul>
            @endif
        </section>
        {{ $statuses->links() }}
    </div>
</div>
@stop