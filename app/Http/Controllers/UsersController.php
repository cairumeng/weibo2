<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\AccountActivation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'show']]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        Mail::to($user)->queue(new AccountActivation($user));
        session()->flash('success', 'You create your account,please activate it!');
        return redirect()->route('home');
    }

    public function activate(Request $request)
    {
        $user = User::firstWhere('activation_token', $request->token);
        if ($user) {
            $user->update(['activated' => true, 'activation_token' => null]);
            session()->flash('success', 'Your account is activated!');
            Auth::login($user);
            return redirect()->route('home');
        } else {
            session()->flash('warning', 'Your token expired, please try it again!');
            return redirect()->route('home');
        }
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users/edit', compact('user'));
    }

    public function uploadAvatar(User $user, Request $request)
    {
        $this->authorize('update', $user);
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $avatar = $request->avatar;
        $imageName = time() . '.' . $avatar->extension();
        Storage::putFileAs('images/avatars', $avatar, $imageName, 'public');
        $path = Storage::url('images/avatars/' . $imageName);
        $user->update([
            'avatar' => $path
        ]);
        return $path;
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);
        $rules = ['name' => 'required|max:255'];
        $fileds = ['name'];
        if ($request->password) {
            $rules['password'] = 'confirmed|min:6';
            $fileds[] = 'password';
        }

        $request->validate($rules);
        $user->update($request->only($fileds));
        session()->flash('success', 'You updated successfully your info!');
        return redirect()->back();
    }

    public function show(User $user)
    {
        $statuses = $user->statuses()->orderBy('created_at', 'desc')->paginate(10);
        return view('users.show', compact('user', 'statuses'));
    }
}
