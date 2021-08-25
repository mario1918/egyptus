<?php

namespace App\Http\Controllers;

use App\Models\Tourguide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class TourguideController
 * @package App\Http\Controllers
 */
class TourguideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tourguides = Tourguide::paginate();

        return view('tourguide.index', compact('tourguides'))
            ->with('i', (request()->input('page', 1) - 1) * $tourguides->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $tourguide = new Tourguide();
        $languages = DB::table("languages")->orderBy("name","asc")->get();
        return view('tourguide.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            "firstName" => "min:5|max:50|required",
            "lastName" =>"min:5|max:50|required",
            "username" => "required",
            "email" => "required|email|unique:users",
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'accept_terms' => 'required|accepted',
            'fb-link' => 'url|required',
            'bio' => "required|min:5|max:1000",
            "1stlanguage" =>'required',
            "2ndlanguage" =>'required',
            'cities' => "required|min:3",
            'profileImg' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'video' => 'mimes:mp4,mov,ogg | max:20000'


        ]);

        $user =  User::create([
            'firstName' => $request->post("firstName"),
            'lastName' => $request->post("lastName"),
            'username' => $request->post("username"),
            'email' => $request->post['email'],
            'password' => Hash::make($request->post['password']),
            'fb-link' => $request->post("fb-link"),
            'isAdmin' => 0,
            'type' => 1,
            "status" => "inactive",
        ]);
        if($request->hasFile('profileImg')) {
            $filenameWithExt= $request->file('profileImg')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profileImg')->getClientOriginalExtension();
            $fileImgName = $filename. '_'.time().'.'.$extension;
            $pathImg = $request->file('profileImg')->storeAs('public/profileImgs/',$fileImgName);
        }
        if($request->hasFile('video')) {
            $filenameWithExt= $request->file('video')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('video')->getClientOriginalExtension();
            $fileVideoName = $filename. '_'.time().'.'.$extension;
            $oathVideo = $request->file('video')->storeAs('public/BioVideos/',$fileVideoName);
        }
        $lang = [$request->post('language1'), $request->post('language2')];
        $languages = implode(",", $lang);
        $tourguide = new Tourguide();
        $tourguide->user_id = $user->id;

        $tourguide = Tourguide::create(
            [
                'user_id' => $user->id,
                'profileImg' => $fileImgName,
                'languages' => $languages,
                'bio' =>$request->post('bio'),
                "priceRate" => $request->post('priceRate'),
                'video' => $fileVideoName,
                'cities' => $request->post('cities'),
            ]
        );
        return redirect()->route('tourguides.index')
            ->with('success', 'Tourguide created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tourguide = Tourguide::find($id);

        return view('tourguide.show', compact('tourguide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tourguide = Tourguide::find($id);

        return view('tourguide.edit', compact('tourguide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tourguide $tourguide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tourguide $tourguide)
    {
        request()->validate(Tourguide::$rules);

        $tourguide->update($request->all());

        return redirect()->route('tourguides.index')
            ->with('success', 'Tourguide updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tourguide = Tourguide::find($id)->delete();

        return redirect()->route('tourguides.index')
            ->with('success', 'Tourguide deleted successfully');
    }
}
