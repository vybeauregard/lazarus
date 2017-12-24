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
        <div class="col-md-2 form-check form-check-inline">
          <label class="form-check-label">
              <p>Homeless <i class="glyphicon {{ $client->homeless == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></p>
          </label>
        </div>
        <div class="col-md-2 form-check form-check-inline">
          <label class="form-check-label">
              <p>Shelter <i class="glyphicon {{ $client->shelter == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></p>
          </label>
        </div>
        <div class="col-md-2 form-check form-check-inline">
          <label class="form-check-label">
              <p>Private Residence <i class="glyphicon {{ $client->private_res == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></p>
          </label>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2 form-check form-check-inline">
          <label class="form-check-label">
              <p>Section 8 <i class="glyphicon {{ $client->section_8 == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></p>
          </label>
        </div>
        <div class="col-md-2 form-check form-check-inline">
          <label class="form-check-label">
              <p>ARHA <i class="glyphicon {{ $client->arha == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></p>
          </label>
        </div>
        <div class="col-md-2 form-check form-check-inline">
          <label class="form-check-label">
              <p>Other <i class="glyphicon {{ $client->other == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></p>
          </label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="apartment_name">Apartment Complex</label>
        </div>
        <div class="col-md-5">
            <p>{{ $client->apartment_name }}</p>
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
            <label for="insurance_type">Medical Insurance?</label>
        </div>
        <div class="col-md-3">
            <p>{{ $client->insurance_type }}</p>
        </div>
    </div>

    @include('clients.readonly-employment')

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
                <td>{{ str_replace("_", " ", title_case($family->relationship)) }}</td>
                <td>{{ $family->sex }}</td>
                <td>{{ $family->dob->format('m/d/Y') }}</td>
                <td>{{ $family->birth_country }}</td>
                <td>{{ $family->insurance }}</td>

            </tr>
    @endforeach
        </tbody>
    </table>
@endif
</div>
@endsection
