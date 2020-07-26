@extends('layouts.default')

@section('content')
<div class="offset-md-1 col-md-10">
    <div class="jumbotron">
        <h1 class="display-4">Hello, Laravel!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to
            featured content or information.</p>
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-success btn-lg" href="{{ route('users.create') }}" role="button">Sign up now</a>
    </div>
</div>
@stop