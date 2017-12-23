<div class="form-group row">
    <div class="col-md-2">
        <label for="monthly_income">Total Monthly Income</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $client->income->monthly_income ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="part_time">Part Time Job</label>
    </div>
    <div class="col-md-5">
        <p>{{ $client->income->part_time }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="pt_employer">Employer</label>
    </div>
    <div class="col-md-3">
        <p>{{ $client->income->pt_employer }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="full_time">Full Time Job</label>
    </div>
    <div class="col-md-5">
        <p>{{ $client->income->full_time }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="ft_employer">Employer</label>
    </div>
    <div class="col-md-3">
        <p>{{ $client->income->ft_employer }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="position">Position</label>
    </div>
    <div class="col-md-5">
        <p>{{ $client->income->position }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="income">Income</label>
    </div>
    <div class="col-md-3">
        <p>${{ $client->income->income ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="unemployed">Unemployed</label>
    </div>
    <div class="col-md-2">
        <label class="form-check-label">
              <p><i class="glyphicon {{ $client->income->unemployed == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></p>
        </label>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="unemployed">Looking for Employment</label>
    </div>
    <div class="col-md-2">
        <label class="form-check-label">
              <p><i class="glyphicon {{ $client->income->looking == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></p>
        </label>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="applying">Applying for jobs where?</label>
    </div>
    <div class="col-md-5">
        <p>{{ $client->income->applying }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="day_labor">Day Labor / Ad Hoc</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $client->income->day_labor ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="rent">Monthly Rent</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $client->income->rent ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="ssi">SSI</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $client->income->ssi ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="snap">Food Stamps/SNAP</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $client->income->snap ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="tanf">TANF</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $client->income->tanf ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="child_support">Child Support</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $client->income->child_support ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="utility_benefits">Utility Benefit Check</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $client->income->utility_benefits ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="veteran_benefits">Veteran Benefits</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $client->income->veteran_benefits ?? '0.00' }}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="other_income">Other Sources of Income</label>
    </div>
    <div class="col-md-3 input-group">
        <p>${{ $client->income->other_income ?? '0.00' }}</p>
    </div>
</div>
