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
        <div class="input-group-append"><span class="input-group-text"><i class="oi oi-calendar" title="calendar" aria-hidden="true"></i></span></div>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        <label for="end_date" class="pull-right">End Date</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control datepicker" id="end_date" name="end_date" data-provide="datepicker" value="{{ old('end_date') ? old('end_date') : Carbon\Carbon::now()->format('m/d/Y') }}" />
        <div class="input-group-append"><span class="input-group-text"><i class="oi oi-calendar" title="calendar" aria-hidden="true"></i></span></div>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="report_type" class="pull-right">Report Type</label>
    </div>
    <div class="col-md-2">
        <select class="form-control" name="report_type" id="report_type">
            @foreach(['parishes', 'counselors', 'visit', 'loans', 'programs', 'requests', 'visits', 'employment', 'income', 'request type', 'new guest', 'living conditions', 'gender', 'ethnicity', 'citizenship'] as $report)
            <option value="{{ snake_case($report) }}">{{ ucwords($report) }}</option>
            @endforeach
        </select>
    </div>
</div>

<div id="report"></div>
@endsection
