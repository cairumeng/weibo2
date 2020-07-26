<div>
    Hello, {{ $user->name }}<br />
    Welocome to our website!Please click the following link to activate your account!
    {{ route('users.activate') . '?token=' . $user->activation_token }}<br />
</div>