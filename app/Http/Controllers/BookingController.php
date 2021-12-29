<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class BookingController
 * @package App\Http\Controllers
 */
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::paginate();

        return view('booking.index', compact('bookings'))
            ->with('i', (request()->input('page', 1) - 1) * $bookings->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $booking = new Booking();
        return view('booking.create', compact('booking'));
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
            'activityChecked[].required' => "Please check at least one activity"
            ];

        $validator = $request->validate( [
            "activities"=> "required",
            "notes" => "required|string",
            "persons" =>"required|numeric",
            "date" => "required|date",
            ],$messages);
        $booking = new Booking();
        $trips = array();
        foreach ($request->post('activities') as $act)
        {
            $split = explode("=>", $act);
            $trips[$split[0]][] =$split[1];
        }

        // tourist id / tourguide_id / trip id / activity array /
        $booking->tourist_id = Auth::user()->hasType->id;
        $booking->trips = json_encode($trips);
        $booking->persons = $request->post('persons');
        $booking->notes = $request->post('notes');
        $booking->hotel = $request->post('hotel');
        $booking->desiredDate = $request->post('date');
        $booking->totalPrice = $request->post("priceTotal");
        $booking->save();
        return json_encode('success');

//        request()->validate(Booking::$rules);

        $booking = Booking::create($request->all());

        return redirect()->route('bookings.index')
            ->with('success', 'Booking created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);

        return view('booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);

        return view('booking.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        request()->validate(Booking::$rules);

        $booking->update($request->all());

        return redirect()->route('bookings.index')
            ->with('success', 'Booking updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $booking = Booking::find($id)->delete();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking deleted successfully');
    }
}
