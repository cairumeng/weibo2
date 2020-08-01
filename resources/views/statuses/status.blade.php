<li class="media ">
    <a href="" class="avatar">
        <img src="{{$user->avatar}}" alt="{{$user->name}}">
    </a>
    <div class="media-body ml-3">
        <h5 class="">
            <strong class=""> {{$user->name}}</strong>
            <small class="">{{$status->created_at->diffForHumans()}}</small>
            @can('destroy', $status)
            <form method="POST" action="{{ route('statuses.destroy',$status->id) }}"
                onsubmit="return confirm('Are you sure to delete this post?');">
                {{ method_field('DELETE') }}
                @csrf
                <button class="btn btn-sm btn-danger float-right">Delete</button>
            </form>
            @endcan
        </h5>
        {{ $status->content}}
    </div>

</li>