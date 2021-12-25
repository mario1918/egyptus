<?php

namespace App\Http\Controllers;

// use App\Models\Tourguide;
use App\Models\Tourguide;
use App\Models\User;
// use Illuminate\Http\Request;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $users = User::where('status', 'active')->where('type',1)->get();
        return view('home',compact('users'));

    }
}
