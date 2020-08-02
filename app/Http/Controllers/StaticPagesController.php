<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaticPagesController extends Controller
{
    public function home()
    {
        $feed_items  = Status::with('user')->latest()->paginate(10);
        return view('statics.home', compact('feed_items'));
    }

    public function about()
    {
        return view('statics.about');
    }

    public function help()
    {
        return view('statics.help');
    }
}
