@extends('layouts.app')

@section('content')
<h2><a href="{{ route('clients.show', $client->id) }}">{{ $client->contact->fullname }}</a> income: {{ $income->date->format('m/d/Y') }} <a href="{{ route('clients.income.edit', [$client->id, $income->id]) }}" class="glyphicon glyphicon-pencil no-underline"></a></h2>

<div style="margin:14px;">
    <div class="family-form" data-id="{{ $income->id ?? 0 }}">
<div class="form-group row">
    <div class="col-md-2">
        <label for="monthly_income">Total Monthly Income</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $income->monthly_income ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="part_time">Part Time Job</label>
    </div>
    <div class="col-md-5">
        <p>{{ $income->part_time }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="pt_employer">Employer</label>
    </div>
    <div class="col-md-3">
        <p>{{ $income->pt_employer }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="full_time">Full Time Job</label>
    </div>
    <div class="col-md-5">
        <p>{{ $income->full_time }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="ft_employer">Employer</label>
    </div>
    <div class="col-md-3">
        <p>{{ $income->ft_employer }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="position">Position</label>
    </div>
    <div class="col-md-5">
        <p>{{ $income->position }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="income">Income</label>
    </div>
    <div class="col-md-3">
        <p>${{ $income->income ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="unemployed">Unemployed</label>
    </div>
    <div class="col-md-2">
        <label class="form-check-label">
              <p><i class="glyphicon {{ $income->unemployed == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></p>
        </label>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="unemployed">Looking for Employment</label>
    </div>
    <div class="col-md-2">
        <label class="form-check-label">
              <p><i class="glyphicon {{ $income->looking == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></p>
        </label>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="applying">Applying for jobs where?</label>
    </div>
    <div class="col-md-5">
        <p>{{ $income->applying }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="day_labor">Day Labor / Ad Hoc</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $income->day_labor ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="rent">Monthly Rent</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $income->rent ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="ssi">SSI</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $income->ssi ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="snap">Food Stamps/SNAP</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $income->snap ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="tanf">TANF</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $income->tanf ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="child_support">Child Support</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $income->child_support ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="utility_benefits">Utility Benefit Check</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $income->utility_benefits ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="veteran_benefits">Veteran Benefits</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $income->veteran_benefits ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="other_income">Other Sources of Income</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $income->other_income ?? '0.00' }}</p>
    </div>
</div>

    </div>
</div>
@endsection
