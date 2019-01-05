<?php

namespace App\Http\Controllers;

use App\TurnAways;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TurnAwayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turn_aways = TurnAways::all();
        return view('turn-aways.index', compact('turn_aways'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TurnAways $turn_away)
    {
        $turn_away->date = Carbon::now()->format('Y-m-d');

        return view('turn-aways.create', compact('turn_away'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TurnAways $turn_away)
    {
        $request->validate([
            'date' => 'required|date_format:m/d/Y',
            'total' => 'required|numeric'
        ]);
        $request->merge(['date' => Carbon::createFromFormat('m/d/Y', $request->date)]);
        $turn_away->fill($request->all())->save();
        return redirect()->route('turn-aways.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TurnAways $turn_away)
    {
        $turn_away->delete();
    }
}
