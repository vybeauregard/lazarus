<div class="form-group row">
    <div class="col-md-2">
        <label for="monthly_income">Total Monthly Income</label>
    </div>
    <div class="col-md-3 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        <input type="number" min="0" class="form-control" id="monthly_income" name="monthly_income" value="{{ old('monthly_income') ? old('monthly_income') : ($client->income ? $client->income->monthly_income : '') }}" />
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
        <input type="number" min="0" class="form-control" id="income" name="income" value="{{ old('income') ? old('income') : ($client->income ? $client->income->income : '') }}" />
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

@foreach([
    'day_labor' => "Day Labor / Ad Hoc",
    'rent' => "Monthly Rent",
    'ssi' => "SSI",
    'snap' => "Food Stamps/SNAP",
    'tanf' => "TANF",
    'child_support' => "Child Support",
    'utility_benefits' => "Utility Benefit Check",
    'veteran_benefits' => "Veteran Benefits",
    'other_income' => "Other Sources of Income",
] as $field => $label)
<div class="form-group row">
    <div class="col-md-2">
        <label for="{{ $field }}">{{ $label }}</label>
    </div>
    <div class="col-md-3 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        <input type="number" min="0" class="form-control" id="{{ $field }}" name="{{ $field }}" value="{{ old($field) ? old($field) : ($client->income ? $client->income->$field : '') }}" />
    </div>
</div>
@endforeach
