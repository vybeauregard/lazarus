<?php

namespace App\Http\Controllers;

use App\Counselor;
use App\Http\Requests\CounselorRequest;

class CounselorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counselors = Counselor::with('contact', 'parish')->get()->sortBy('contact.last_name');
        return view('counselors.index', compact('counselors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counselor = new Counselor();
        return view('counselors.create', compact('counselor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CounselorRequest $request)
    {
        $counselor = Counselor::create($request->all());

        return redirect()->route('counselors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Counselor  $counselor
     * @return \Illuminate\Http\Response
     */
    public function show(Counselor $counselor)
    {
        $counselor->load('contact', 'parish');
        return view('counselors.show', compact('counselor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Counselor  $counselor
     * @return \Illuminate\Http\Response
     */
    public function edit(Counselor $counselor)
    {
        $counselor->load('contact', 'parish');
        return view('counselors.edit', compact('counselor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Counselor  $counselor
     * @return \Illuminate\Http\Response
     */
    public function update(CounselorRequest $request, Counselor $counselor)
    {

        $counselor->updateWithRelations($request->all());
        return redirect()->route('counselors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Counselor  $counselor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counselor $counselor)
    {
        $counselor->delete();
    }
}
