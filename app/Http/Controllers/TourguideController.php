<?php

namespace App\Http\Controllers;

use App\Models\Tourguide;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;


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
        return view('tourguide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "firstName" => "min:5|max:50|required",
            "lastName" =>"min:5|max:50|required",
            "username" => "required",
            "email" => "required|email|unique:users",
            'password' => 'required_with:confirm_password|
            regex:/^
            (?=[^a-z]*[a-z]) # ensure one lower case letter
            (?=[^A-Z]*[A-Z]) # ensure one upper case letter
            (?=.*?[0-9]).{6,}$/        # ensure a number',
            'accept_terms' => 'required|accepted',
            'bio' => "required|min:5|max:1000",
            "languages" =>'required',
            "activities" =>'required',
            'cities' => "required|string|min:3",
            'profileImg' => 'image|mimes:jpg,png,jpeg,gif,svg',
            'video' => 'mimes:mp4,mov,ogg | max:20000'


        ]);
        if($request->hasFile('profileImg')) {
            $filenameWithExt= $request->file('profileImg')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profileImg')->getClientOriginalExtension();
            $fileImgName = $filename. '_'.time().'.'.$extension;
            $pathImg = $request->file('profileImg')->storeAs('profileImgs',$fileImgName);
        }
        else{
            $pathImg = "profileImgs/boy.png";
        }

        $user =  User::create([
            'firstName' => $request->post("firstName"),
            'lastName' => $request->post("lastName"),
            'username' => $request->post("username"),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('password')),
            'profileImg' => $pathImg,
            'fb_link' => $request->post("fb_link"),
          
            'portfolio' => $request->post("portfolio"),
            'isAdmin' => 0,
            'type' => 1,
            "status" => "inactive",
        ]);

        if($request->hasFile('video')) {
            $filenameWithExt= $request->file('video')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('video')->getClientOriginalExtension();
            $fileVideoName = $filename. '_'.time().'.'.$extension;
            $pathVideo = $request->file('video')->storeAs('BioVideos',$fileVideoName);
        }
        else{
            $pathVideo = null;
        }

        $tourguide = new Tourguide();
        $tourguide->user_id = $user->id;

        $tourguide = Tourguide::create(
            [
                'user_id' => $user->id,
                'languages' => implode(",",$request->post('languages')),
                'bio' =>$request->post('bio'),
                "priceRate" => $request->post('priceRate'),
                'video' => $pathVideo,
                'activities' => implode(",",$request->post('activities')),
                'cities' => $request->post('cities'),
            ]
        );
        // $mail = new MailController;
        // $mail->verifyMail($user);
        return redirect()->route('toruguideProfile',Crypt::encryptString($user->hasType->id))->withErrors(['msg' => "We will send you a mail when the admin
        verify your account"]); 
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
    public function profile($id)
    {
        $tourguide = Tourguide::findOrFail(Crypt::decryptString($id));
      

        return view('tourguide.profile',compact('tourguide'));
    }

     public function addReviews(Request $request)
    {
        $tourguide = Crypt::decryptString($request->post('tourguide'));
        $newReview = new Review();
        $newReview->review =$request->post('review');
        $newReview->tourguide_id = $tourguide;
        $newReview->reviewer = auth()->user()->id;
        $newReview->save();

            return redirect()->back()->withErrors('msg','Review has been successfully created');
        }
        // $reviews = DB::table('reviews')->where('tourguide_id', $request->tourguide)->get();
        
}
