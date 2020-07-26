<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function destroy()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (User::where('email', $request->email)->doesntExist()) {
            return back()->withErrors(['email' => "This email doesn't exist"]);
        }

        if (Auth::attempt($request->only(['email', 'password']))) {
            session()->flash('success', 'You are logged in!');
            return redirect()->route('home');
        } else {
            return back()->withErrors(['email' => 'Your email or password is not correct']);
        }
    }
}
