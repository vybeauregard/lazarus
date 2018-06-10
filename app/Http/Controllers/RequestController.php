<?php

namespace App\Http\Controllers;

use App\Visit;
use App\Request;
use App\Http\Requests\RequestRequest;

class RequestController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Visit $visit)
    {
        $request = new Request();
        return view('visits.requests.create', compact('visit', 'request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestRequest $request, Visit $visit)
    {
        $visit->requests()
            ->save(new Request($request->all()))
            ->actions()
            ->attach($request->actions);
        return redirect()->route('visits.edit', $visit->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visit, Request $request)
    {
        return view('visits.requests.show', compact('visit', 'request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Visit $visit, Request $request)
    {
        return view('visits.requests.edit', compact('visit', 'request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestRequest $form_request, Visit $visit, Request $request)
    {
        $request->fill($form_request->all())->save();
        return redirect()->route('visits.edit', $visit->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visit $visit, Request $request)
    {
        $request->delete();
    }
}
