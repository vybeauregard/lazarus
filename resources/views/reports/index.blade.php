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
<code>#SELECT
COUNT(*) AS total_visits,
COUNT(DISTINCT client_id) AS unique_clients
FROM visits
WHERE `date` BETWEEN CAST('2017-01-01' AS DATE) AND CAST('2017-12-31' AS DATE)</code>
    Total Visits:
    </div>
    <div class="form-group">
    Total Clients:
    </div>
    <div class="form-group">
<code>SELECT COUNT(*) AS new_clients
FROM clients
WHERE `date` BETWEEN CAST('2017-01-01' AS DATE) AND CAST('2017-12-31' AS DATE);</code>
    New Clients: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
<code>SELECT c.id, COUNT(*) as repeats
FROM clients c
LEFT JOIN visits v ON v.client_id = c.id
WHERE c.date BETWEEN CAST('2017-01-01' AS DATE) AND CAST('2017-12-31' AS DATE)
GROUP BY c.id;</code>
    Repeat New Clients: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
<code>SELECT COUNT(*) as visits, v.date
FROM visits v
WHERE v.date BETWEEN CAST('2017-01-01' AS DATE) AND CAST('2017-12-31' AS DATE)
AND WEEKDAY(v.date) = 1
GROUP BY v.date;</code>
    Average weekly visitors (Tuesdays only):
    </div>
    <div class="form-group">
        <code>???</code>
    Average weekly turn-aways:
    </div>
    <div class="form-group">
<code>
SELECT c.id, COUNT(*) as repeats, WEEKDAY(v.date) AS day_of_week
FROM clients c
LEFT JOIN visits v ON v.client_id = c.id
WHERE c.date BETWEEN CAST('2017-01-01' AS DATE) AND CAST('2017-12-31' AS DATE)
GROUP BY c.id, v.date
HAVING COUNT(*) = 1;
</code>
    One-time visitors: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
<code>
SELECT c.id, COUNT(*) as repeats, WEEKDAY(v.date) AS day_of_week
FROM clients c
LEFT JOIN visits v ON v.client_id = c.id
WHERE c.date BETWEEN CAST('2017-01-01' AS DATE) AND CAST('2017-12-31' AS DATE)
GROUP BY c.id, v.date
HAVING COUNT(*) = 2;
</code>
    Two-time visitors: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
<code>
SELECT c.id, COUNT(*) as repeats, WEEKDAY(v.date) AS day_of_week
FROM clients c
LEFT JOIN visits v ON v.client_id = c.id
WHERE c.date BETWEEN CAST('2017-01-01' AS DATE) AND CAST('2017-12-31' AS DATE)
GROUP BY c.id, v.date
HAVING COUNT(*) > 2;
</code>
    Three or more-time visitors: <span id="count"></span> <span id="percent"></span>
    </div>

    <div class="form-group">
<code>SELECT c.gender
FROM clients c
LEFT JOIN visits v ON v.client_id = c.id
WHERE c.date BETWEEN CAST('2017-01-01' AS DATE) AND CAST('2017-12-31' AS DATE)
AND gender = 'Male'
GROUP BY v.id, c.gender;
</code>
    Male: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
<code>SELECT c.gender
FROM clients c
LEFT JOIN visits v ON v.client_id = c.id
WHERE c.date BETWEEN CAST('2017-01-01' AS DATE) AND CAST('2017-12-31' AS DATE)
AND gender = 'Male'
GROUP BY v.id, c.gender;
</code>
    Female: <span id="count"></span> <span id="percent"></span>
    </div>
    <div class="form-group">
<code>
"SELECT c.dob, TIMESTAMPDIFF(YEAR,c.dob,CURDATE()) AS age
FROM clients c
LEFT JOIN visits v ON v.client_id = c.id
WHERE c.date BETWEEN CAST('2017-01-01' AS DATE) AND CAST('2017-12-31' AS DATE)
AND c.dob <> '';"
</code>
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
