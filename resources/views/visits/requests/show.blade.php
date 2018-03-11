@extends('layouts.app')

@section('content')
<h2>{{ $visit->client->fullname }} <a href="{{ route('visits.show', $visit->id) }}">({{ $visit->date->format('m/d/Y') }})</a> Request: {{ $visitrequest->formattedType }} <a href="{{ route('visits.requests.edit', [$visit->id, $visitrequest->id]) }}" class="glyphicon glyphicon-pencil no-underline"></a></h2>


<div style="margin:14px;">
    <div class="family-form" data-id="{{ $visitrequest->id ?? 0 }}">
        <div class="form-group row">
            <div class="col-md-2">
                <label for="relationship">Type</label>
            </div>
            <div class="col-md-2">
                <p>{{ $visitrequest->formattedType }}</p>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-2">
                <label for="name">Action</label>
            </div>
            <div class="col-md-5">
                <p>{{ $visitrequest->action }}</p>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-2">
                <label for="name">Amount</label>
            </div>
            <div class="col-md-5">
                <p>${{ $visitrequest->amount }}</p>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-2">
                <label for="name">Notes</label>
            </div>
            <div class="col-md-5">
                <p>{{ $visitrequest->notes }}</p>
            </div>
        </div>

    </div>
</div>
@endsection
