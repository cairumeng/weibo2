<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {
        $this->authorize('follow', $user);
        Auth::user()->follow($user->id);
        session()->flash('success', "You have followed {$user->name} ");
        return back();
    }

    public function destroy(User $user)
    {
        $this->authorize('follow', $user);
        Auth::user()->unfollow($user->id);
        session()->flash('success', "You have unfollowed {$user->name} ");
        return back();
    }
}
