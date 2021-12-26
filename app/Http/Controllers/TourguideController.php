<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Expertise;
use App\Models\Tourguide;
use App\Models\User;
use App\Models\Review;
use App\Models\TourguideTrip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;



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
    public function __construct()
    {
    }

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

        $messages = [
            "password.required" => "Password is required",
            "password.min" => "Password must be at least 8 characters",
            "password.regex" => "password must contain at least one upper case , one number",
            // 'password.confirmed' =>'password confirmation does not match',
            'birthdate.after' => 'You must be an Adult',
            'bio.min' => 'You must write a paragraph about 200 word',
            'work_experience.min' => 'You must write a long paragraph about 500 word',
            'degree.string' => 'You must write at least one education background',
            'uni.string' => 'University is required',
            'gradYear.date' => 'Graduation Year is required',
            'degree' => 'You must write at least one education background',
            'uni' => 'University is required',
            'gradYear.date' => 'Graduation Year is required',
            'langName.required' => 'You must add at least one language',
        ];
        // $bio = $request->post('bio');
        // if(count(explode(' ', $bio)) > 20)
        //     $messages['bio'] = 'maxWords';


        if($request->post('activities') != null)
        {
            foreach($request->post('activities') as $key => $activity)
            {
                $act = new Activity();
                $act->name = $activity[0];
                $act->price = $activity[1];
                $act->save();
                array_push($activities,$act->id);
            }
        }


        return redirect()->route('toruguideProfile',Crypt::encryptString($user->hasType->id))->withErrors(['msg' => "We will send you a mail when the admin
        verify your account"]);
    }

    public function storeImg($img,$name,$user)
    {
            $filenameWithExt= $img->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $img->getClientOriginalExtension();
            $fileImgName = $name. "_". $user . "_" . time().'.'.$extension;
            $pathImg =  $img->move('storage/tourGuideDocuments',$fileImgName);


        return $pathImg;
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
    public function editPhoto(Request $request , $id)
    {
        $user = User::find($id);
        if($request->hasFile('profileImg')) {
            $filenameWithExt= $request->file('profileImg')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profileImg')->getClientOriginalExtension();
            $fileImgName = $filename. '_'.time().'.'.$extension;
            $pathImg = $request->file('profileImg')->move('storage/profileImgs',$fileImgName);

        }
        else{
            $pathImg = "images/boy.png";
        }
        $user->profileImg = $pathImg;
        $user->save();
        return redirect()->route('tourguideProfile',$user->hasType->id)->with('success','Profile Photo has been updated');
    }
    public function update(Request $request, $id)
    {
//        request()->validate(Tourguide::$rules);
        $tourguide = Tourguide::find($id);
        $user = User::where("id",Auth::user()->id)->get();
        if($request->hasFile('profileImg')) {
            $filenameWithExt= $request->file('profileImg')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profileImg')->getClientOriginalExtension();
            $fileImgName = $filename. '_'.time().'.'.$extension;
            $pathImg = $request->file('profileImg')->move('profileImgs',$fileImgName);
        }
        else{
            $pathImg = "images/boy.png";
        }
        $user->profileImg = $pathImg;
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
        $tourguide = Tourguide::findOrFail($id);
        $languages = explode('|',$tourguide->languages);
        $expertises = Expertise::all();

        return view('tourguide.profile',compact('tourguide','expertises','languages'));
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
        public $data = array();

        public function steps(Request $request)
        {
            if($request->post('step') == 1)
            {
                 $validator = Validator::make($request->all(), [

                     //personal info
                     "firstName" => "min:5|max:50|required",
                     "lastName" =>"min:5|max:50|required",
                     "email" => "required|email|",
                     'password' => ['required',
                     'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/'],
                     "region"=> 'required|string',
                     "country"=> 'required|string',
                     'birthdate' => "required|date_format:Y-m-d"
                 ]);
                 if($validator->fails())
                 {
                     return response()->json(['error'=>$validator->errors()->all()]);
                 }

                Session::put('firstName',$request->post("firstName"));
                Session::put('lastName',$request->post("lastName"));
                Session::put('email',$request->post("email"));
                Session::put('password',Hash::make($request->post('password')));
                Session::put('location',$request->post('region') . "/" . $request->post('country'));
                Session::put('birthdate',$request->post('birthdate'));
                Session::put('phoneNo',$request->post("phoneNo"));

                return json_encode("step1 done");
            }

            elseif($request->post('step') == 2)
            {
                 $validator = $request->validate( [
                 'work_experience' => "required|min:5",
                 ]);


                Session::put('work_experience', $request->post('work_experience'));

                return json_encode("step2 done");

            }

            elseif($request->post('step') == 3)
            {
                Session::put('education', $request->post('education'));
                return json_encode("step3 done");

            }

            elseif($request->post('step') == 4)
            {
                // $validator = $request->validate( [
                // 'work_experience' => "required|min:5",
                // ]);
                $languages = implode("|",$request->post('languages'));
                Session::put('languages', $languages);
//                $this->data = [
//                    'firstName' => Session::get("firstName"),
//                    'lastName' => Session::get("lastName"),
//                    'email' => Session::get("email"),
//                    'password' => Session::get("password"),
//                    'location' => Session::get('location'),
//                    'birthdate' => Session::get("birthdate"),
//                   'phoneNo'=> Session::get("phoneNo"),
//                    'education' =>Session::get("education"),
//                    'work_Exp' =>Session::get("work_experience"),
//                    'langauges' =>Session::get("langauges"),
//                ];
                return json_encode("step4 done");

            }
            elseif($request->post('step') == 5)
            {
                if($request->hasFile('profileImg')) {
                    $filenameWithExt= $request->file('profileImg')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('profileImg')->getClientOriginalExtension();
                    $fileImgName = $filename. '_'.time().'.'.$extension;
                    $pathImg = $request->file('profileImg')->move('storage/profileImgs',$fileImgName);
                }
                else{
                    $pathImg = "images/boy.png";
                }

                //documents uploads
                $frontNation = $this->storeImg($request->file('frontNation'),'frontNation',3);
                $backNation = $this->storeImg($request->file('backNation'),'backNation',3);
                $frontLicense = $this->storeImg($request->file('frontLicense'),'frontLicense',3);
                $backLicense = $this->storeImg($request->file('backLicense'),'backLicense',3);

                $user =  new User();
                $user->firstName = Session::get('firstName');
                $user->lastName = Session::get("lastName");
                $user->email = Session::get('email');
                $user->password =  Hash::make(Session::get('password'));
                $user->profileImg = $pathImg;
                $user->phoneNo = Session::get('phoneNo');
                $user->fb_link  = "";
                $user->location= Session::get('location');
                $user->birthdate= Session::get('birthdate');
                $user->isAdmin = 0;
                $user->type = 1;
                $user->status = "inactive";
                $user->save();


                $tourguide = new Tourguide();
                $tourguide->user_id = $user->id;
                $tourguide->bio ="";
                $tourguide->nationality = "Egyptian";
                $tourguide->work_experience = Session::get("work_experience");
                $tourguide->education = Session::get('education');
                $tourguide->languages = Session::get('languages');
                $tourguide->nationalId = json_encode([$frontNation,$backNation]);
                $tourguide->tourLicense = json_encode([$frontLicense,$backLicense]);
                $tourguide->personalRate = 2;
                $tourguide->priceRate = 5;
                $tourguide->save();

                $mail = new MailController();
                $mail->verifyMail($user);
                return redirect()->route("home")->with('success','Please wait for the admin to verify the account.');
            }
        }

        public  function tourguidesProfile()
        {
            $tourguides = Tourguide::all();
            return view("tourguide.profiles",compact("tourguides"));
        }

}
