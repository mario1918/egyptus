<?php

namespace App\Http\Controllers;

use App\Models\TourguideTrip;
use Illuminate\Http\Request;

/**
 * Class TourguideTripController
 * @package App\Http\Controllers
 */
class TourguideTripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tourguideTrips = TourguideTrip::paginate();

        return view('tourguide-trip.index', compact('tourguideTrips'))
            ->with('i', (request()->input('page', 1) - 1) * $tourguideTrips->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tourguideTrip = new TourguideTrip();
        return view('tourguide-trip.create', compact('tourguideTrip'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tourguideTrip = TourguideTrip::create($request->all());

        return redirect()->route('tourguide-trips.index')
            ->with('success', 'TourguideTrip created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tourguideTrip = TourguideTrip::find($id);

        return view('tourguide-trip.show', compact('tourguideTrip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tourguideTrip = TourguideTrip::find($id);

        return view('tourguide-trip.edit', compact('tourguideTrip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TourguideTrip $tourguideTrip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TourguideTrip $tourguideTrip)
    {
        request()->validate(TourguideTrip::$rules);

        $tourguideTrip->update($request->all());

        return redirect()->route('tourguide-trips.index')
            ->with('success', 'TourguideTrip updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tourguideTrip = TourguideTrip::find($id)->delete();

        return redirect()->route('tourguide-trips.index')
            ->with('success', 'TourguideTrip deleted successfully');
    }
}
