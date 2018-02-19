@extends('layouts.app')

@section('title')
| Programs | {{ $program->name }}
@endsection

@section('content')
<h3>Program {{ $program->name }} for {{ $program->client->name }} <a href="{{ route('programs.edit', $program->id) }}" class="oi oi-pencil no-underline"></a></h3>

<div style="margin:14px;">
<div class="family-form" data-id="{{ $family->id ?? 0 }}">
    <div class="form-group row">
        <div class="col-md-2">
            <label for="client">Client</label>
        </div>
        <div class="col-md-2">
            <p>{{ $program->client->name }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="name">Name</label>
        </div>
        <div class="col-md-5">
            <p>{{ $program->name }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="given_info">Client Given Info On</label>
        </div>
        <div class="col-md-5">
            <p>{{ $program->given_info ? $program->given_info->format('m/d/Y') : '' }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="application_submitted">Application Submission Date</label>
        </div>
        <div class="col-md-5">
            <p>{{ $program->application_submitted ? $program->application_submitted->format('m/d/Y') : '' }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="application_approved">Application Approval Date</label>
        </div>
        <div class="col-md-5">
            <p>{{ $program->application_approved ? $program->application_approved->format('m/d/Y') : '' }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="program_start">Program Start Date</label>
        </div>
        <div class="col-md-5">
            <p>{{ $program->program_start ? $program->program_start->format('m/d/Y') : '' }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="completed">Program Completed</label>
        </div>
        <div class="col-md-2">
            <label class="form-check-label">
                  <p><i class="glyphicon {{ $program->completed == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></p>
            </label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="denied">Application Denied</label>
        </div>
        <div class="col-md-2">
            <label class="form-check-label">
                  <p><i class="glyphicon {{ $program->denied == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></p>
            </label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="denial">Application Denial Reason</label>
        </div>
        <div class="col-md-5">
            <p>{{ $program->denial }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="denial_details">Denial Details</label>
        </div>
        <div class="col-md-5">
            <p>{{ $program->denial_details }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="notes">Notes</label>
        </div>
        <div class="col-md-5">
            <p>{{ $program->notes }}</p>
        </div>
    </div>
</div>

@endsection
