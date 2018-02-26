<?php

namespace App\Http\Controllers;

use App\Client;
use App\Income;
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
        return view('clients.create', compact('client'));
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
        $client->load('contact', 'family', 'income');
        return view('clients.show', compact('client'));
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
        return view('clients.edit', compact('client'));
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
        $client->updateWithRelations($request->all());

        $route = $this->getRedirectRouteOnUpdate($client);

        return redirect($route);

    }

    /**
     * Get the redirect route based on what button was clicked.
     *
     * @param  \App\Client  $client
     * @return string
     */
    private function getRedirectRouteOnUpdate($client)
    {
        switch (request('submit'))
        {
            case "Save Client and Add Family Member":
                return route('clients.families.create', $client->id);
            case "Save Client and Add Income information":
                return route('clients.income.create', $client->id);
            default:
                return route('clients.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
    }
}
