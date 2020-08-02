<li class="media ">
    <a href="{{ route('users.show',$user)}}" class="avatar">
        <img src="{{$user->avatar}}" alt="{{$user->name}}">
    </a>
    <div class="media-body ml-3">
        <h5 class="">
            <a href="{{ route('users.show',$user)}}" class="">
                <strong>{{$user->name}}</strong>
            </a>
            <small class="">{{$status->created_at->diffForHumans()}}</small>
            @if (Auth::check())
            @if($user->id === Auth::user()->id)
            @can('destroy', $status)
            <form method="POST" action="{{ route('statuses.destroy',$status->id) }}"
                onsubmit="return confirm('Are you sure to delete this post?');">
                {{ method_field('DELETE') }}
                @csrf
                <button class="btn btn-sm btn-danger float-right">Delete</button>
            </form>
            @endcan
            @else
            @if(Auth::user()->isfollowing($user->id))
            <form method="POST" action="{{route('followers.destroy',$user)}}" class="d-inline">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-sm btn-success float-right">Unfollow</button>

            </form>
            @else
            <form method="POST" action="{{ route('followers.store',$user)}}" class="d-inline">
                @csrf
                <button class="btn btn-sm btn-danger float-right">Follow</button>
            </form>
            @endif
            @endif
            @endif
        </h5>
        {{ $status->content}}
    </div>

</li>