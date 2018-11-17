@extends('layouts.app')

@section('title')
| Reports
@endsection

@section('content')
<h3>Reports</h3>

<div class="form-group row">
    <div class="col-md-2">
        <label for="start_date" class="pull-right">Start Date</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control datepicker" id="start_date" name="start_date" data-provide="datepicker" value="{{ old('start_date') ? old('start_date') : Carbon\Carbon::now()->startOfMonth()->format('m/d/Y') }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        <label for="end_date" class="pull-right">End Date</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control datepicker" id="end_date" name="end_date" data-provide="datepicker" value="{{ old('end_date') ? old('end_date') : Carbon\Carbon::now()->format('m/d/Y') }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="report_type" class="pull-right">Report Type</label>
    </div>
</div>

<div id="report">
    <div class="form-group">
    Total Visits:
    </div>
    <div class="form-group">
    Total Clients:
    </div>
    <div class="form-group">
    New Clients: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
    Repeat New Clients: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
    Average weekly visitors (Tuesdays only):
    </div>
    <div class="form-group">
    Average weekly turn-aways:
    </div>
    <div class="form-group">
    One-time visitors: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
    Two-time visitors: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
    Three or more-time visitors: <span id="count"></span> <span id="percent"></span>
    </div>

    <div class="form-group">
    Male: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
    Female: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
    Age ranges: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
    Number in household: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
    Children 18 and under: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
    ARHA/Section 8 clients: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
    Birthplace: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
    Ethnicity: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
    Zipcode: <span id="count"></span> <span id="percent"></span>
    </div>

    <div class="form-group">
    Average income:
    </div>
    <div class="form-group">
    Multiple forms of income assistance: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
    Help request type: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
    ALIVE Referrals: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
    OPMH Referrals: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
    Amount owed: [tbd]
    </div>




</div>
@endsection
