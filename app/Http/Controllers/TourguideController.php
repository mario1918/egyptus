<?php

namespace App\Http\Controllers;

use App\Models\Activity;
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

        dd($this->data);
        

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

        dd($request->post());
        $validator = $request->validate( [
            
            //personal info
            "firstName" => "min:5|max:50|required",
            "lastName" =>"min:5|max:50|required",
            "email" => "required|email|",
            'password' => ['required','confirmed',
            'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]){8,}$/'],
            "phoneNo" => 'required|numeric|digits_between:11,14',
            "region"=> 'required|string',
            "country"=> 'required|string',
            'birthdate' => "required|date_format:Y-m-d|after:2000-01-01",
        //work experience
            'work_experience' => "required|min:5",
            // 'bio' => "required|min:5",
        //educational background
            "degree" =>'required|string',
            "uni" =>'required|string',
            "gradYear" =>'required|date',
        //languages fluency array (langName , spoken , wriiten , comprehension)
            "langName" =>'required',
            "speaking" => 'required',
            "writting" => 'required',
            "comprehension" => 'required',

        //documents upload
            "frontNation" =>'required|image|mimes:jpg,png,jpeg,gif,svg',
            "backNation" =>'required|image|mimes:jpg,png,jpeg,gif,svg',
            "frontLicense" =>'required|image|mimes:jpg,png,jpeg,gif,svg',
            "backLicense" =>'required|image|mimes:jpg,png,jpeg,gif,svg',
            'profileImg' => 'image|mimes:jpg,png,jpeg,gif,svg',

        //trips
        // 'title' => 'required|string',
        // 'description' => 'required|string',
        // 'activityName' => 'required|string',
        // 'activityPrice' => 'required|float',
        // 'hours' =>'required|numeric',
        // 'price' =>'required|float',

        ],$messages);
    
        
        if(User::where('email',$request->post('email'))->first() != null)
        { 
            $user = User::where('email',$request->post('email'))->first();
        }
        else{
        $user =  new User();
        $user->firstName = $request->post("firstName");
        $user->lastName = $request->post("lastName");
        $user->email = $request->post('email');
        $user->password =  Hash::make($request->post('password'));
        $user->profileImg = "";
        $user->fb_link  = $request->post("fb_link");
        $user->location= $request->post('region') . "/" . $request->post('country');
        $user->birthdate= $request->post('birthdate');
        $user->isAdmin = 0;
        $user->type = 1;
        $user->status = "inactive";
        $user->save();
        }
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
        $user->profileImg = $pathImg;
        $user->save();

        //eduction background
        $degrees = $request->post('degree');
        $uni = $request->post('uni');
        $gradYear = $request->post('gradYear');
        $edu = $education =array();
        if($degrees != null){
            foreach($degrees as $key => $degree)
            {
                array_push($edu, implode(',',[$degree, $uni[$key],$gradYear[$key]]));
            }
            $education = implode("|",$edu);
        }
        //languages
        $langs = $request->post('langName');
        $spoken = $request->post('spoken');
        $written = $request->post('written');
        $comperhen = $request->post('comperhension');

        $lang = $languages = array();
        if($langs != null)
        {
            foreach($langs as $key => $l)
            {
                $lang[$l] = [$spoken[$key],$written[$key],$comperhen[$key]];
            }
            $languages = json_encode($lang);
        }
        else{
            $lang["English"] = ['fluent','fluent','fluent','fluent'];
        }

        //documents uploads
        $frontNation = $this->storeImg($request->file('frontNation'),'frontNation',3);
        $backNation = $this->storeImg($request->file('backNation'),'backNation',3);
        $frontLicense = $this->storeImg($request->file('frontLicense'),'frontLicense',3);
        $backLicense = $this->storeImg($request->file('backLicense'),'backLicense',3);
       

        $tourguide = new Tourguide();
        $tourguide->user_id = $user->id;
        $tourguide->bio = $request->post('bio');
        $tourguide->work_experience = $request->post('work_experience');
        $tourguide->education = $education;
        $tourguide->langauges = json_encode($lang);
        $tourguide->nationalId = json_encode([$frontNation,$backNation]);
        $tourguide->tourLicense = json_encode([$frontLicense,$backLicense]);
        $tourguide->personalRate = 2;
        $tourguide->save();

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
        $trip = new TourguideTrip();
        $trip->title = $request->post('title');
        $trip->description = $request->post('description');
        $trip->activities = json_encode($activities);
        $trip->hours = date("H:i:s", $request->post('hours')*60*60);
        $trip->fair = $request->post('fare');
        $trip->save();
          
        return redirect()->route('toruguideProfile',Crypt::encryptString($user->hasType->id))->withErrors(['msg' => "We will send you a mail when the admin
        verify your account"]); 
    }

    public function storeImg($img,$name,$user)
    {
            $filenameWithExt= $img->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $img->getClientOriginalExtension();
            $fileImgName = $name. "_". $user . "_" . time().'.'.$extension;
            $pathImg = $img->storeAs('public/tourGuideDocuments',$fileImgName);
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
        $tourguide = Tourguide::findOrFail($id);
        $languages = explode(',',$tourguide->languages);
        $lang = $languages[0];

        return view('tourguide.profile',compact('tourguide','lang'));
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
                // $validator = Validator::make($request->all(), [
            
                //     //personal info
                //     "firstName" => "min:5|max:50|required",
                //     "lastName" =>"min:5|max:50|required",
                //     "email" => "required|email|",
                //     'password' => ['required',
                //     'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/'],
                //     "phoneNo" => 'required|numeric|digits_between:11,14',
                //     "region"=> 'required|string',
                //     "country"=> 'required|string',
                //     'birthdate' => "required|date_format:Y-m-d|before:01/01/2000"
                // ]);
                // if($validator->fails())
                // {
                //     return response()->json(['error'=>$validator->errors()->all()]);
                // }
                
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
                // $validator = $request->validate( [
                // 'work_experience' => "required|min:5",
                // ]);

                Session::put('work_experience', $request->post('work_experience'));

                return json_encode("step2 done");

            }

            elseif($request->post('step') == 3)
            {
                // $validator = $request->validate( [
                // 'work_experience' => "required|min:5",
                // ]);
                Session::put('education', $request->post('education'));
                return json_encode("step3 done");

            }

            elseif($request->post('step') == 4)
            {
                // $validator = $request->validate( [
                // 'work_experience' => "required|min:5",
                // ]);

                Session::put('langauges', $request->post('langauges'));
                $this->data = [
                    'firstName' => Session::get("firstName"),
                    'lastName' => Session::get("lastName"),
                    'email' => Session::get("email"),
                    'password' => Session::get("password"),
                    'location' => Session::get('location'),
                    'birthdate' => Session::get("birthdate"),
                   'phoneNo'=> Session::get("phoneNo"),
                    'education' =>Session::get("education"),
                    'work_Exp' =>Session::get("work_experience"),
                    'langauges' =>Session::get("langauges"),
                ];

            }
            elseif($request->post('step') == 5)
            {
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
                $tourguide->work_experience = Session::get("work_experience");
                $tourguide->education = Session::get('education');
                $tourguide->languages = Session::get('langauges');
                $tourguide->nationalId = json_encode([$frontNation,$backNation]);
                $tourguide->tourLicense = json_encode([$frontLicense,$backLicense]);
                $tourguide->personalRate = 2;
                $tourguide->priceRate = 5;
                $tourguide->save();

                return redirect()->route('home')
                ->with('success', 'Please wait for the admin to verify the account.');
                
            }
        }
       
}
