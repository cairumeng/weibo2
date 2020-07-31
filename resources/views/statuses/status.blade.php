<li class="media ">
    <a href="" class="avatar">
        <img src="{{$user->avatar}}" alt="{{$user->name}}">
    </a>
    <div class="media-body ml-3">
        <h5 class="">
            <strong class=""> {{$user->name}}</strong>
            <small class="">{{$status->created_at->diffForHumans()}}</small>
        </h5>
        {{ $status->content}}
    </div>

</li>