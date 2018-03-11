<?php

namespace App\Http\Controllers;

use App\Client;
use App\Family;
use App\Http\Requests\FamilyRequest;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {
        $family = new Family();
        return view('clients.families.create', compact('client', 'family'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FamilyRequest $request, Client $client)
    {
        $client->family()->save(new Family($request->family));
        return redirect()->route('clients.edit', $client->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client, Family $family)
    {
        return view('clients.families.show', compact('client', 'family'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client, Family $family)
    {
        return view('clients.families.edit', compact('client', 'family'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FamilyRequest $request, Client $client, Family $family)
    {
        $family->fill($request->family)->save();
        return redirect()->route('clients.edit', $client->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client, Family $family)
    {
        $family->delete();
    }
}
