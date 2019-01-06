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

        if(!$reports->totalVisits->unique_clients) {
            return redirect()->back()->withError('No visitors logged in this date range!');
        }
        return view('reports.index', compact('reports'));
    }
}
