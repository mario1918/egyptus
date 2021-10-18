<?php

namespace App\Http\Controllers;

use App\Models\Tourist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Mail;

/**
 * Class TouristController
 * @package App\Http\Controllers
 */
class TouristController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tourists = Tourist::paginate();

        return view('tourist.index', compact('tourists'))
            ->with('i', (request()->input('page', 1) - 1) * $tourists->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $tourist = new Tourist();
//        $languages = DB::table("languages")->orderBy("name","asc")->get();
        return view('tourist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        request()->validate(Tourist::$rules);
        $validate = $request->validate([
            "firstName" => "min:5|max:50|required",
            "lastName" =>"min:5|max:50|required",
            "username" => "required",
            "email" => "required|email|unique:users",
            'profileImg' => 'image|mimes:jpg,png,jpeg,gif,svg',
            'password' => 'required_with:confirmpassword|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/',
           
        ]);
       
        if($request->hasFile('profileImg')) {
            $filenameWithExt= $request->file('profileImg')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profileImg')->getClientOriginalExtension();
            $fileImgName = $filename. '_'.time().'.'.$extension;
            $pathImg = $request->file('profileImg')->storeAs('profileImgs',$fileImgName);
        }
        else{
            $pathImg = "images/boy.png";
        }
        $user =  User::create([
            'firstName' => $request->post("firstName"),
            'lastName' => $request->post("lastName"),
            'username' => $request->post("username"),
            'email' => $request->post("email"),
            'password' => Hash::make($request->post("password")),
            'fb-link' => $request->post("fb-link"),
            'profileImg' => $pathImg,
            'isAdmin' => 0,
            'type' => 2,
            "status" => "inactive",
        ]);

        $tourist = Tourist::create([
            'user_id' => $user->id,
        ]);
        $mail = new MailController;

        $mail->verifyMail($user);

        return redirect()->route('home')
            ->with('success', 'Please check your email for to verify the account.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tourist = Tourist::find($id);

        return view('tourist.show', compact('tourist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tourist = Tourist::find($id);

        return view('tourist.edit', compact('tourist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tourist $tourist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tourist $tourist)
    {
        request()->validate(Tourist::$rules);

        $tourist->update($request->all());

        return redirect()->route('tourists.index')
            ->with('success', 'Tourist updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tourist = Tourist::find($id);
        $user = User::find($tourist->user_id)->delete();
        $tourist->delete();

        return redirect()->route('tourists.index')
            ->with('success', 'Tourist deleted successfully');
    }
}
