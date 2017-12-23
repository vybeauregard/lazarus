@extends('layouts.app')

@section('content')
<h2>Counselor {{ $counselor->name }} <a href="{{ route('counselors.edit', $counselor->id) }}" class="glyphicon glyphicon-pencil no-underline"></a></h2>

<div style="margin:14px;">

    <div class="form-group row">
        <div class="col-md-2">
            <label for="name">Name</label>
        </div>
        <div class="col-md-5">
            <p>{{ $counselor->fullName }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="address">Address</label>
        </div>
        <div class="col-md-2">
            <p>{!! implode("<br>", $counselor->formattedAddress) !!}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="phone">email</label>
        </div>
        <div class="col-md-2">
            <p>{{ $counselor->contact->email }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="phone">Phone Number</label>
        </div>
        <div class="col-md-2">
            <p>{{ $counselor->formattedPhone }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="emergency_phone">Emergency Contact Number</label>
        </div>
        <div class="col-md-2">
            <p>{{ $counselor->formattedEmergencyPhone }}</p>
        </div>
    </div>

</div>
@endsection
