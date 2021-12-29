<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Tourguide;
use App\Models\TourguideTrip;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
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
        $validator = $request->validate( [
//            trips
             'tripTitle' => 'required|string',
             'tripDescription' => 'required|string',
             'tripPrice' =>'required|numeric',
             'tripPhoto' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        $actArray = array();
        for ($i=0;$i<count($request->post('actTitle'));$i++)
        {
            $act = new Activity;
            $act->name = $request->post('actTitle')[$i];
            $act->description = $request->post('actDes')[$i];
            $act->price = $request->post('actPrice')[$i];
            $act->save();
            array_push($actArray,$act->id);
        }
        $trip = new Trip();
        $trip->name = $request->post('tripTitle');
        $trip->description = $request->post('tripDescription');

        if($request->hasFile('tripPhoto')) {
            $filenameWithExt= $request->file('tripPhoto')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('tripPhoto')->getClientOriginalExtension();
            $fileImgName = $filename. '_'.time().'.'.$extension;
            $pathImg = $request->file('tripPhoto')->move('storage/tripPhoto',$fileImgName);
        }
        $trip->photo = $pathImg;
        $trip->activities = json_encode($actArray);
        $trip->price = $request->post('tripPrice');
        $trip->tourguide_id = Auth::user()->hasType->id;
        $trip->save();

        $tourguide = Tourguide::find(Auth::user()->hasType->id);

        return redirect()->route("tourguideProfile", $tourguide->id)->with('success', 'Item created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $actArray = array();
        for ($i=0;$i<count($request->post('actId'));$i++) {
            if ($request->post('actTitle')[$i] != null) {
                $act = Activity::firstOrNew(array('id' => $request->post('actId')[$i]));
                $act->name = $request->post('actTitle')[$i];
                $act->description = $request->post('actDes')[$i];
                $act->price = $request->post('actPrice')[$i];
                $act->save();
                array_push($actArray, $act->id);
            }
        }

        $trip = Trip::find($id);
        if($request->hasFile('tripPhoto')) {
            $filenameWithExt= $request->file('tripPhoto')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('tripPhoto')->getClientOriginalExtension();
            $fileImgName = $filename. '_'.time().'.'.$extension;
            $pathImg = $request->file('tripPhoto')->move('storage/tripPhoto',$fileImgName);
        }
        $trip->name = $request->post("tripTitle");
        $trip->description = $request->post("tripDescription");
        $trip->price = $request->post("tripPrice");
        $trip->activities = json_encode($actArray);
        $trip->update();

        $tourguide = Tourguide::find(Auth::user()->hasType->id);

        return redirect()->route("tourguideProfile", $tourguide->id)->with('success', 'Item created successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        //
    }
}
