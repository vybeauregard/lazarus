@extends('layouts.app')

@section('content')
<h2><a href="{{ route('clients.show', $client->id) }}">{{ $client->contact->fullname }}</a> family: {{ $family->name }} <a href="{{ route('clients.families.edit', [$client->id, $family->id]) }}" class="glyphicon glyphicon-pencil no-underline"></a></h2>

<div style="margin:14px;">
<div class="family-form" data-id="{{ $family->id ?? 0 }}">
    <div class="form-group row">
        <div class="col-md-2">
            <label for="relationship">Relationship</label>
        </div>
        <div class="col-md-2">
            <p>{{ $family->relationship }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="name">Name</label>
        </div>
        <div class="col-md-5">
            <p>{{ $family->name }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="dob_month">Date of Birth</label>
        </div>
        <div class="col-md-5">
            <p>{{ $family->dob != null ?? $family->dob->format('m/d/Y') }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="sex">Sex</label>
        </div>
        <div class="col-md-2">
            <p>{{ $family->sex == 'f' ? 'Female' : 'Male' }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="birth_country">Country of Birth</label>
        </div>
        <div class="col-md-3">
            <p>{{ $family->birth_country }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="insurance">Medical Insurance?</label>
        </div>
        <div class="col-md-3">
            <p>{{ $family->insurance }}</p>
        </div>
    </div>
</div></div>
@endsection
