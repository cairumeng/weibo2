<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home')}}">Weibo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if(Auth::check())
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('help') }}">user list</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{Auth::user()->avatar}}" alt="{{ Auth::user()->name}}">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('users.show',Auth::user() ) }}">User center</a>
                        <a class="dropdown-item" href="{{ route('users.edit',Auth::user() ) }}">Info edit</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('sessions.destroy', Auth::user())}}" method="POST">
                            {{method_field('DELETE')}}
                            @csrf
                            <button class="dropdown-item" href="">Logout</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        @else
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('help') }}">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
            </ul>
        </div>
        @endif
    </div>
</nav>