<?php

namespace App\Http\Controllers;

use App\Action;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actions = Action::all();

        return view('actions.index', compact('actions'));
    }

    public function create(Action $action)
    {
        return view('actions.create', compact('action'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|max:255',
        ]);
        Action::create($request->all());
        return redirect()->route('actions.index');
    }

    public function destroy(Action $action)
    {
        $action->delete();
        return;
    }
}
