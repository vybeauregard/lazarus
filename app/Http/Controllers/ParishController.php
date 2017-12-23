<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ParishRequest;
use App\Parish;

class ParishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parishes = Parish::with('contact')->get();
        return view('parishes.index', compact('parishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parish = new Parish;
        $parish->contact = new Contact;
        return view('parishes.create', compact('parish'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParishRequest $request)
    {
        $parish = Parish::create($request->all());
        $contact = new Contact($request->all());
        $parish->contact()->save($contact);

        $parish->push();
        return redirect()->route('parishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function show(Parish $parish)
    {
        return view('parishes.show', compact('parish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function edit(Parish $parish)
    {
        return view('parishes.edit', compact('parish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function update(ParishRequest $request, Parish $parish)
    {
        $parish->fill($request->all());
        if(is_null($parish->contact)){
            $contact = new Contact($request->all());
            $parish->contact()->save($contact);

        } else {
            $parish->contact->fill($request->all());
        }

        $parish->push();
        return redirect()->route('parishes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parish $parish)
    {
        $parish->delete();
    }
}
