@extends('layouts.app')

@section('title')
| Parishes | {{ $parish->name }}
@endsection

@section('content')
<h2>{{ $parish->name }} Parish <a href="{{ route('parishes.edit', $parish->id) }}" class="oi oi-pencil no-underline"></a></h2>

<div style="margin:14px;">

    <div class="form-group row">
        <div class="col-md-2">
            <label for="name">Name</label>
        </div>
        <div class="col-md-5">
            <p>{{ $parish->name }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="address">Address</label>
        </div>
        <div class="col-md-2">
            <p>{!! implode("<br>", $parish->formattedAddress) !!}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="phone">email</label>
        </div>
        <div class="col-md-2">
            <p>{{ $parish->contact ? $parish->contact->email : '' }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="phone">Phone Number</label>
        </div>
        <div class="col-md-2">
            <p>{{ $parish->formattedPhone }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="emergency_phone">Emergency Contact Number</label>
        </div>
        <div class="col-md-2">
            <p>{{ $parish->formattedEmergencyPhone }}</p>
        </div>
    </div>

</div>
@endsection
