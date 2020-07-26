<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\AccountActivation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

class UsersController extends Controller
{
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
}
