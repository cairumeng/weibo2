@foreach(['success','warning','info','danger'] as $msg)
@if(session()->has($msg))
<div class="alert alert-{{$msg}}" role="alert">
    {{ session()->get($msg) }}
</div>
@endif
@endforeach