@extends('layouts.default')
@section ('content')
<div class="offset-md-3 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="avatar text-center">
                <img src="{{$user->avatar}}" alt="{{$user->name}}" id="current_avatar"
                    onclick="document.querySelector('#avatar').click()" />
                <div id="upload_message"></div>
                <input type="file" id="avatar" hidden>
            </div>

            <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{ $user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email" value="{{ $user->email }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Password Confirmation</label>
                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
                </div>
                <button class="btn btn-block btn-success">Edit info </button>
            </form>
        </div>
    </div>

</div>
@stop

@section('js')
<script>
    var uploadMessage = document.querySelector('#upload_message')
    var currentAvatar = document.querySelector('#current_avatar')

    function uploadAvatar(event) {
        var avatar = event.target.files[0]
        var formData = new FormData()
        formData.append('avatar', avatar)

        uploadMessage.innerHTML = 'Uploading...'
        axios.post("{{ route('users.uploadAvatar', $user) }}", formData)
            .then(function (response) {
                console.log(response.data)
                uploadMessage.innerHTML = 'Success to upload'
                currentAvatar.src = response.data
            })
            .catch(function (error) {
                console.log(error)
                uploadMessage.innerHTML = 'Fail to upload'
            })
    }

    document.querySelector('#avatar').addEventListener('change', uploadAvatar)
</script>
@stop