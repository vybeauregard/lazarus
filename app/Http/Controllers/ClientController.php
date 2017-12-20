<?php

namespace App\Http\Controllers;

use App\Client;
use App\Contact;
use App\Family;
use App\Income;
use App\State;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::with(['contact', 'family'])->get()->sortBy('contact.last_name');
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client;
        $client->income = new Income;
        $states = new State();
        $states = $states->list();
        return view('clients.create', compact('client', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $client = Client::create($request->all());
        $contact = new Contact($request->all());
        $income = new Income($request->all());
        foreach($request->family as $person) {
            $client->family()->save(new Family($person));
        }
        $client->contact()->save($contact);
        $client->income()->save($income);
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        dd($client);
        return view('clients.edit', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $client->load('contact', 'family', 'income');
        $states = new State();
        $states = $states->list();
        return view('clients.edit', compact('client', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        $client->fill($request->all());
        if(is_null($client->contact)){
            $contact = new Contact($request->all());
            $client->contact()->save($contact);

        } else {
            $client->contact->fill($request->all());
        }
        if(is_null($client->income)){
            $income = new Income($request->all());
            $client->income()->save($income);
        } else {
            $client->income->fill($request->all());
        }
        $client->push();
        return redirect()->route('clients.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
