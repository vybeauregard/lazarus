<?php

namespace App\Http\Controllers;

use App\RequestType;
use Illuminate\Http\Request;

class RequestTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requestTypes = RequestType::all();

        return view('request-types.index', compact('requestTypes'));
    }

    public function create(RequestType $requestType)
    {
        return view('request-types.create', compact('requestType'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|max:255',
        ]);
        RequestType::create($request->all());
        return redirect()->route('request-types.index');
    }

    public function destroy(RequestType $requestType)
    {
        $requestType->delete();
        return;
    }
}
