<?php

namespace App\Http\Controllers;

use App\Models\Tourguide;
use Illuminate\Http\Request;

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
        $tourguide = new Tourguide();
        return view('tourguide.create', compact('tourguide'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tourguide::$rules);

        $tourguide = Tourguide::create($request->all());

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
