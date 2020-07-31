<a href="{{ route('users.show',$user->id)}}">
    <img src="{{$user->avatar}}" alt="{{$user->name}}" class="mini-avatar">
</a>
<h1>{{$user->name}}</h1>