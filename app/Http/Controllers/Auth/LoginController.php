<?php

namespace App\Http\Controllers\Auth;

use App\Models\Tourguide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;



class LoginController extends Controller
{
    public function LoginPage()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request){
        // Retrive Input
        $validator =  Validator::make($request->all(),
        [
            'email'     => 'required',
            'password'  => 'required|min:6'
        ]);

        $credentials = $request->only('email', 'password');
        $user = User::where("email", $request->email)->first();
        if(!empty($user))
        {
        if($user->isAdmin == 1 || $user->type == 2)
        {
            if (Auth::attempt($credentials)) {
               //if user is admin => redirect on admin dashboard
                if($user->isAdmin ==1)
                {
                    $tourguides = count(Tourguide::all());
                    return view('admin.dashboard',compact('tourguides'));
                }
                 //if user is tourist => redirect on admin dashboard
                elseif($user->type == 2)
                {
                    return redirect('/')->withErrors(['msg' => "Check Your Mail To Verify Your Account"]);

                }
            }
            else{
                return redirect()->back()->withErrors(['msg' => "The cerdentials is not right"]);
            }
        }
        //the tourguide is active
        elseif($user->type == 1 && $user->status == 'active')
        {
            if (Auth::attempt($credentials)) {
                // if success login => redirect to profile tourguide
                return redirect()->route('toruguideProfile',Crypt::encryptString($user->hasType->id));
            }
            else{
                //wait for the admin to verify the tourguide account in admiin dashboard
                return redirect()->back()->withErrors(['msg' => "The cerdentials is not right"]);
            }
        }
        elseif($user->type == 1  && $user->status == 'inactive')
        {
            if ( Auth::attempt($credentials)) {
                // if success login => redirect to profile tourguide
                return redirect('')->withErrors(['msg' => "We will send you a mail when the admin
                verify your account"]);
            }
            else{
                return redirect()->back()->withErrors(['msg' => "The cerdentials is not right"]);
            }

        }
    }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home');
    }

}
