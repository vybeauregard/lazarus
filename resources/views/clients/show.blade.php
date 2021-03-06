@extends('layouts.app')

@section('title')
| Clients | {{ $client->name }}
@endsection

@section('content')
<h3>{{ $client->name }} <a href="{{ route('clients.edit', $client->id) }}" class="glyphicon glyphicon-pencil no-underline"></a></h3>
<div style="margin:14px;">
    <div class="form-group row">
        <div class="col-md-2">
            <label for="date">Date</label>
        </div>
        <div class="col-md-2">
            <p>{{ $client->date->format('m/d/Y') }}</p>
        </div>
        <div class="col-md-2">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="name">Name</label>
        </div>
        <div class="col-md-5">
            <p>{{ $client->fullName }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="address">Address</label>
        </div>
        <div class="col-md-2">
            <p>{!! implode("<br>", $client->formattedAddress) !!}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="phone">Phone Number</label>
        </div>
        <div class="col-md-2">
            <p>{{ $client->formattedPhone }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="emergency_phone">Emergency Contact Number</label>
        </div>
        <div class="col-md-2">
            <p>{{ $client->formattedEmergencyPhone }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="dob_month">Date of Birth</label>
        </div>
        <div class="col-md-5">
            <p>{{ $client->dob ? $client->dob->format('m/d/Y') : '' }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="gender">Gender</label>
        </div>
        <div class="col-md-1">
            <p>{{ $client->gender }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="ethnicity">Ethnicity</label>
        </div>
        <div class="col-md-2">
            <p>{{ $client->ethnicity }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="birth_country">Country of Birth</label>
        </div>
        <div class="col-md-3">
            <p>{{ $client->birth_country }}</p>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">
            <label for="veteran_status">Veteran Status</label>
        </div>
        <div class="col-md-3">
            <p>{{ $client->veteran_status }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="incarceration">Incarceration History (if any)</label>
        </div>
        <div class="col-md-5">
            <p>{{ $client->incarceration }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="insurance">Medical Insurance?</label>
        </div>
        <div class="col-md-3">
            <p>{{ $client->insurance }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="source">Source</label>
        </div>
        <div class="col-md-5">
            <p>{{ $client->source }}</p>
        </div>
    </div>

    @if($client->income->count())
    <hr />
    <div class="row">
        <div class="col-md-10">
            <h4>Income</h4>
        </div>

        <div class="col-md-2">
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Total Monthly Income</th>
                <th>Unemployed</th>
                <th>Homeless</th>
                <th>ARHA</th>
            </tr>
        </thead>
        <tbody>
            @foreach($client->income as $income)
            <tr data-income-id="{{ $income->id }}">
                <td><a href="{{ route('clients.income.show', [$client->id, $income->id]) }}">{{ $income->date->format('m/d/Y') }}</a></td>
                <td>${{ number_format($income->monthly_income) ?? '0.00' }}</td>
                <td><i class="glyphicon {{ $income->unemployed == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></td>
                <td><i class="glyphicon {{ $income->homeless == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></td>
                <td><i class="glyphicon {{ $income->arha == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <em>No income data provided</em>
    @endif

@if($client->family->count())
    <hr />
    <div class="row">
        <div class="col-md-10">
            <h4>Family Members</h4>
        </div>

        <div class="col-md-2">
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Relationship</th>
                <th>Sex</th>
                <th>Date of Birth</th>
                <th>Country of Birth</th>
                <th>Insurance</th>
            </tr>
        </thead>
        <tbody>
    @foreach($client->family as $family)
            <tr data-family-id="{{ $family->id }}">
                <td><a href="{{ route('clients.families.show', [$client->id, $family->id]) }}">{{ $family->name }}</a></td>
                <td>{{ str_replace("_", " ", Str::title($family->relationship)) }}</td>
                <td>{{ $family->sex }}</td>
                <td>{{ $family->dob !== null ?? $family->dob->format('m/d/Y') }}</td>
                <td>{{ $family->birth_country }}</td>
                <td>{{ $family->insurance }}</td>

            </tr>
    @endforeach
        </tbody>
    </table>
@else
    <em>No family data provided</em>
@endif
    
@if($client->visit->count())
    <hr />
    <div class="row">
        <div class="col-md-10">
            <h4>Visits</h4>
        </div>

        <div class="col-md-2">
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Counselor</th>
                <th>Request Type</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($client->visit->sortByDesc('date') as $visit)
            <tr>
                <td>
                    <a href="{{ route('visits.show', $visit->id) }}">{{ $visit->date->format('m/d/Y') }}</a>
                </td>
                <td>
                    {{ $visit->counselor->name }}
                </td>
                <td>
                    {{ $visit->formattedRequests }}
                </td>
                <td>
                    ${{ number_format($visit->requests->sum('amount'), 2) }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <em>No visit data provided</em>
@endif
</div>
@endsection
