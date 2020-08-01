<li class="media ">
    <a href="" class="avatar">
        <img src="{{$user->avatar}}" alt="{{$user->name}}">
    </a>
    <div class="media-body ml-3">
        <h5 class="">
            <strong class=""> {{$user->name}}</strong>
            <small class="">{{$status->created_at->diffForHumans()}}</small>
            <form method="POST" action="{{ route('statuses.destroy',$status->id) }}">
                {{ method_field('DELETE') }}
                @csrf
                <button class="btn btn-sm btn-danger float-right">Delete</button>
            </form>
        </h5>
        {{ $status->content}}
    </div>

</li>