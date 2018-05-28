<?php

namespace App\Http\Controllers;

use App\Visit;
use Carbon\Carbon;
use App\Http\Requests\VisitRequest;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visits = Visit::all();
        return view('visits.index', compact('visits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $visit = new Visit([
            'date' => Carbon::now(),
        ]);
        return view('visits.create', compact('visit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisitRequest $request)
    {
        $visit = Visit::create($request->all());
        return redirect()->route('visits.requests.create', $visit);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visit)
    {
        $visit->load('client', 'counselor');
        return view('visits.show', compact('visit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function edit(Visit $visit)
    {
        $visit->load('client', 'counselor');
        return view('visits.edit', compact('visit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(VisitRequest $request, Visit $visit)
    {
        $visit->update($request->all());

        $route = $this->getRedirectRouteOnUpdate($visit);

        return redirect($route);

    }

    /**
     * Get the redirect route based on what button was clicked.
     *
     * @param  \App\Visit  $visit
     * @return string
     */
    private function getRedirectRouteOnUpdate($visit)
    {
        switch (request('submit'))
        {
            case "Save Visit and Add Request":
                return route('visits.requests.create', $visit->id);
            default:
                return route('visits.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visit $visit)
    {
        $visit->delete();
    }
}
