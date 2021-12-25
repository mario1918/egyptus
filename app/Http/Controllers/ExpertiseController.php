<?php

namespace App\Http\Controllers;

use App\Models\Expertise;
use App\Models\Tourguide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function show(Expertise $expertise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function edit(Expertise $expertise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expertise $expertise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expertise $expertise)
    {
        //
    }

    public function saveExpertise(Request $request)
    {
        $tourguide = Tourguide::find(Auth::user()->hasType->id);
        $tourguide->expertises = implode(',',$request->post('expertises'));
        $tourguide->save();
        return redirect()->route("tourguideProfile", $tourguide->id)->with('success', 'Item created successfully!');

    }

    public function saveLanguages(Request $request)
    {
        $langArray = array();
        for ($i=$request->post("count");$i>0;$i--)
        {
            $i--;
            $request->post("langName")[$i] != null ? $langName = $request->post("langName")[$i] : "";
            $request->post("speaking")[$i] != null ? $speaking = $request->post("speaking")[$i] : "";
            $request->post("writing")[$i] != null ? $writing = $request->post("writing")[$i] : "";
            $request->post("comprehension")[$i] != null ? $comprehension = $request->post("comprehension")[$i] : "";
            $lang = [$langName,$speaking,$writing,$comprehension];
            $l = implode(",",$lang);
            array_push($langArray,$l);
            $i--;
        }
        $tourguide = Tourguide::find(Auth::user()->hasType->id);
        $languages = $tourguide->languages;
        $ll = explode("|",$languages);
        $ls = array_merge($ll,$langArray);
        $tourguide->languages = implode('|',$ls);
        $tourguide->save();
        return back()->with('success', 'Item created successfully!');

    }
}
