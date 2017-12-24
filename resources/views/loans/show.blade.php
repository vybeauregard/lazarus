@extends('layouts.app')

@section('content')
<h2>Loan for {{ $loan->client->name }} <a href="{{ route('loans.edit', $loan->id) }}" class="glyphicon glyphicon-pencil no-underline"></a></h2>

<div style="margin:14px;">

    <div class="form-group row">
        <div class="col-md-2">
            <label for="request_date">Request Date</label>
        </div>
        <div class="col-md-5">
            <p>{{ $loan->request_date->format('m/d/Y') }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="name">Client</label>
        </div>
        <div class="col-md-5">
            <p>{{ $loan->client->name }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="date">Loan Date</label>
        </div>
        <div class="col-md-5">
            <p>{{ $loan->date->format('m/d/Y') }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="type">Type</label>
        </div>
        <div class="col-md-5">
            <p>{{ $loan->type }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="amount">Loan Amount</label>
        </div>
        <div class="col-md-5">
            <p>${{ $loan->amount }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="due_date">Due Date</label>
        </div>
        <div class="col-md-5">
            <p>{{ $loan->due_date->format('m/d/Y') }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="remaining">Amount remaining</label>
        </div>
        <div class="col-md-5">
            <p>${{ $loan->remaining }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="total_payments">Total Payments</label>
        </div>
        <div class="col-md-5">
            <p>{{ $loan->total_payments }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="payment_count">Number of Payments</label>
        </div>
        <div class="col-md-5">
            <p>{{ $loan->payment_count }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="last_payment">Last Payment</label>
        </div>
        <div class="col-md-5">
            <p>{{ $loan->last_payment->format('m/d/Y') }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="closed">Closed</label>
        </div>
        <div class="col-md-2">
            <label class="form-check-label">
                  <p><i class="glyphicon {{ $loan->closed == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></p>
            </label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="budgeted">Budgeted</label>
        </div>
        <div class="col-md-2">
            <label class="form-check-label">
                  <p><i class="glyphicon {{ $loan->budgeted == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></p>
            </label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="budget_date">Budet Date</label>
        </div>
        <div class="col-md-5">
            <p>{{ $loan->budget_date->format('m/d/Y') }}</p>
        </div>
    </div>

</div>
@endsection

