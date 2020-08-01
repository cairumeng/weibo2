<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusesController extends Controller
{
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        Status::create(['content' => $request->content, 'user_id' => $user_id]);
        session()->flash('success', 'You have created a new post!');
        return back();
    }

    public function destroy(Status $status)
    {
        $this->authorize('destroy', $status);
        $status->delete();
        session()->flash('success', 'You have deleted one of your posts!');
        return back();
    }
}
