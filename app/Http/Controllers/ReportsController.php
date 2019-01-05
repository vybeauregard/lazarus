<?php

namespace App\Http\Controllers;

use App\Reports;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function show(Request $request, Reports $reports)
    {
        $reports->validateDates();

        return view('reports.index', compact('reports'));
    }
}
