<?php

namespace App\Http\Controllers;

use App\Client;
use App\Income;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Client $client)
    {
        //
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
        return [$client, $income];
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client, Income $income)
    {
        //
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
        //
    }
}
