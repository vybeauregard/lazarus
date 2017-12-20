<div class="form-group row">
    <div class="col-md-2">
        <label for="monthly_income">Total Monthly Income</label>
    </div>
    <div class="col-md-3 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        <input type="text" class="form-control" id="monthly_income" name="monthly_income" value="{{ old('monthly_income') ? old('monthly_income') : ($client->income ? $client->income->monthly_income : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="part_time">Part Time Job</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="part_time" name="part_time" value="{{ old('part_time') ? old('part_time') : ($client->income ? $client->income->part_time : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="pt_employer">Employer</label>
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" id="pt_employer" name="pt_employer" value="{{ old('pt_employer') ? old('pt_employer') : ($client->income ? $client->income->pt_employer : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="full_time">Full Time Job</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="full_time" name="full_time" value="{{ old('full_time') ? old('full_time') : ($client->income ? $client->income->full_time : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="ft_employer">Employer</label>
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" id="ft_employer" name="ft_employer" value="{{ old('ft_employer') ? old('ft_employer') : ($client->income ? $client->income->ft_employer : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="position">Position</label>
    </div>
    <div class="col-md-5">
        <textarea class="form-control" rows="5" id="position" name="position">{{ old('position') ? old('position') : ($client->income ? $client->income->position : '') }}</textarea>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="income">Income</label>
    </div>
    <div class="col-md-3 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        <input type="text" class="form-control" id="income" name="income" value="{{ old('income') ? old('income') : ($client->income ? $client->income->income : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="unemployed">Unemployed</label>
    </div>
    <div class="col-md-2 btn-group" data-toggle="radio">
        <label class="btn btn-text">
            @if(old('unemployed') && old('unemployed' == '1'))
            <input type="radio" name="unemployed" id="unemployed_y" value="1" checked>
            @elseif(($client->income ? $client->income->unemployed : '') == 1)
            <input type="radio" name="unemployed" id="unemployed_y" value="1" checked>
            @else
            <input type="radio" name="unemployed" id="unemployed_y" value="1">
            @endif
            Yes
        </label>
        <label class="btn btn-text">
            @if(old('unemployed') && old('unemployed' == '0'))
            <input type="radio" name="unemployed" id="unemployed_n" value="0" checked>
            @elseif(($client->income ? $client->income->unemployed : '') == 0)
            <input type="radio" name="unemployed" id="unemployed_n" value="0" checked>
            @else
            <input type="radio" name="unemployed" id="unemployed_n" value="0" {{ old('unemployed') == "n" ? 'checked' : '' }}>
            @endif
            No
        </label>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="looking">Looking for Employment</label>
    </div>
    <div class="col-md-2 btn-group" data-toggle="radio">
        <label class="btn btn-text">
            @if(old('looking') && old('looking' == '1'))
            <input type="radio" name="looking" id="looking_y" value="1" checked>
            @elseif(($client->income ? $client->income->looking : '') == 1)
            <input type="radio" name="looking" id="looking_y" value="1" checked>
            @else
            <input type="radio" name="looking" id="looking_y" value="1">
            @endif
            Yes
        </label>
        <label class="btn btn-text">
            @if(old('looking') && old('looking' == '0'))
            <input type="radio" name="looking" id="looking_n" value="0" checked>
            @elseif(($client->income ? $client->income->looking : '') == 0)
            <input type="radio" name="looking" id="looking_n" value="0" checked>
            @else
            <input type="radio" name="looking" id="looking_n" value="0">
            @endif
            No
        </label>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="applying">Applying for jobs where?</label>
    </div>
    <div class="col-md-5">
        <textarea class="form-control" rows="5" id="applying" name="applying">{{ old('applying') ? old('applying') : ($client->income ? $client->income->applying : '') }}</textarea>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="day_labor">Day Labor / Ad Hoc</label>
    </div>
    <div class="col-md-3 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        <input type="text" class="form-control" id="day_labor" name="day_labor" value="{{ old('day_labor') ? old('day_labor') : ($client->income ? $client->income->day_labor : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="rent">Monthly Rent</label>
    </div>
    <div class="col-md-3 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        <input type="text" class="form-control" id="rent" name="rent" value="{{ old('rent') ? old('rent') : ($client->income ? $client->income->rent : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="ssi">SSI</label>
    </div>
    <div class="col-md-3 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        <input type="text" class="form-control" id="ssi" name="ssi" value="{{ old('ssi') ? old('ssi') : ($client->income ? $client->income->ssi : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="snap">Food Stamps/SNAP</label>
    </div>
    <div class="col-md-3 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        <input type="text" class="form-control" id="snap" name="snap" value="{{ old('snap') ? old('snap') : ($client->income ? $client->income->snap : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="tanf">TANF</label>
    </div>
    <div class="col-md-3 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        <input type="text" class="form-control" id="tanf" name="tanf" value="{{ old('tanf') ? old('tanf') : ($client->income ? $client->income->tanf : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="child_support">Child Support</label>
    </div>
    <div class="col-md-3 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        <input type="text" class="form-control" id="child_support" name="child_support" value="{{ old('child_support') ? old('child_support') : ($client->income ? $client->income->child_support : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="utility_benefits">Utility Benefit Check</label>
    </div>
    <div class="col-md-3 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        <input type="text" class="form-control" id="utility_benefits" name="utility_benefits" value="{{ old('utility_benefits') ? old('utility_benefits') : ($client->income ? $client->income->utility_benefits : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="veteran_benefits">Veteran Benefits</label>
    </div>
    <div class="col-md-3 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        <input type="text" class="form-control" id="veteran_benefits" name="veteran_benefits" value="{{ old('veteran_benefits') ? old('veteran_benefits') : ($client->income ? $client->income->veteran_benefits : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="other_income">Other Sources of Income</label>
    </div>
    <div class="col-md-3 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        <input type="text" class="form-control" id="other_income" name="other_income" value="{{ old('other_income') ? old('other_income') : ($client->income ? $client->income->other_income : '') }}" />
    </div>
</div>
