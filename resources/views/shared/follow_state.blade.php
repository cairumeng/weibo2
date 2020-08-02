<div class="row follow-state">
    <div class="col-md-4" id="followings">
        <a href="{{ route ('users.followings',['user'=>$user])}}">
            <strong>
                {{$user->followings()->count()}}
            </strong>
            <h5>Followings</h5>
        </a>
    </div>
    <div class="col-md-4" id="followers">
        <a href="{{ route('users.followers',['user'=>$user])}}">
            <strong>
                {{$user->followers()->count()}}
            </strong>
            <h5>Followers</h5>
        </a>

    </div>
    <div class="col-md-4" id="statuses">
        <a href="{{ route ('users.show',['user'=>$user])}}">
            <strong>
                {{$user->statuses()->count()}}
            </strong>
            <h5>Statuses</h5>
        </a>
    </div>
</div>