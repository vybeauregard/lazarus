<?php

namespace App\Http\Controllers;

use App\Client;
use App\Income;
use App\Http\Requests\IncomeRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {
        $income = new Income([
            'date' => Carbon::now(),
        ]);
        return view('clients.income.create', compact('client', 'income'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function store(IncomeRequest $request, Client $client)
    {
        $client->income()->save(new Income($request->all()));
        return redirect()->route('clients.edit', $client->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client, Income $income)
    {
        return view('clients.income.show', compact('client', 'income'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client, Income $income)
    {
        return view('clients.income.edit', compact('client', 'income'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(IncomeRequest $request, Client $client, Income $income)
    {
        $income->fill($request->all())->save();
        return redirect()->route('clients.edit', $client->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client, Income $income)
    {
        $income->delete();
    }
}
