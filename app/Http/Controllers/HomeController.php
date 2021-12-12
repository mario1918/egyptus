<?php

namespace App\Http\Controllers;

// use App\Models\Tourguide;
use App\Models\Tourguide;
use App\Models\User;
// use Illuminate\Http\Request;
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


            if (Auth::user() && (Auth::user()->isAdmin == 1))
            {
                $tourguides = count(Tourguide::all());
                return view('admin.dashboard',compact('tourguides'));
            }
            else{
                $users = User::where('status', 'active')->where('type',1)->get();
                return view('home',compact('users'));
            }

    }
    public function verification($user_id)
    {
        $user = User::where('id',$user_id)->first();
        $user->status = "active";
        $user->save();
        if ($user->type == 1)
        {
            return view("/");
        }
        elseif($user->type == 2)
        {
            return "Profile of This tourist";
        }
    }
}
