<div class="form-group row">
    <div class="col-md-2">
        <label for="date">Date</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control datepicker" id="date" name="date" data-provide="datepicker" value="{{ old('date') ?? $income->date->format('m/d/Y') }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="monthly_income">Total Monthly Income</label>
    </div>
    <div class="col-md-3 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        <input type="number" min="0" class="form-control" id="monthly_income" name="monthly_income" readonly value="{{ old('monthly_income') ? old('monthly_income') : ($income ? $income->monthly_income : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="part_time">Part Time Job</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="part_time" name="part_time" value="{{ old('part_time') ? old('part_time') : ($income ? $income->part_time : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="pt_employer">Employer</label>
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" id="pt_employer" name="pt_employer" value="{{ old('pt_employer') ? old('pt_employer') : ($income ? $income->pt_employer : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="full_time">Full Time Job</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="full_time" name="full_time" value="{{ old('full_time') ? old('full_time') : ($income ? $income->full_time : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="ft_employer">Employer</label>
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" id="ft_employer" name="ft_employer" value="{{ old('ft_employer') ? old('ft_employer') : ($income ? $income->ft_employer : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="position">Position</label>
    </div>
    <div class="col-md-5">
        <textarea class="form-control" rows="5" id="position" name="position">{{ old('position') ? old('position') : ($income ? $income->position : '') }}</textarea>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="income">Income</label>
    </div>
    <div class="col-md-3 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        <input type="number" min="0" class="form-control" id="income" name="income" value="{{ old('income') ? old('income') : ($income ? $income->income : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2 form-check form-check-inline">
      <label class="form-check-label">
      @if(old('homeless') && old('homeless') == 1)
        <input class="form-check-input" type="checkbox" id="homeless"  checked name="homeless" value="1">
      @elseif($income->homeless == 1)
        <input class="form-check-input" type="checkbox" id="homeless"  checked name="homeless" value="1">
      @else
        <input class="form-check-input" type="checkbox" id="homeless" name="homeless" value="1">
      @endif
          Homeless
      </label>
    </div>
    <div class="col-md-2 form-check form-check-inline">
      <label class="form-check-label">
      @if(old('shelter') && old('shelter') == 1)
        <input class="form-check-input" type="checkbox" id="shelter" checked name="shelter" value="1">
      @elseif($income->shelter == 1)
        <input class="form-check-input" type="checkbox" id="shelter" checked name="shelter" value="1">
      @else
        <input class="form-check-input" type="checkbox" id="shelter" name="shelter" value="1">
      @endif
          Shelter
      </label>
    </div>
    <div class="col-md-2 form-check form-check-inline">
      <label class="form-check-label">
      @if(old('private_res') && old('private_res') == 1)
        <input class="form-check-input" type="checkbox" id="private_res" checked name="private_res" value="1">
      @elseif($income->private_res == 1)
        <input class="form-check-input" type="checkbox" id="private_res" checked name="private_res" value="1">
      @else
        <input class="form-check-input" type="checkbox" id="private_res" name="private_res" value="1">
      @endif
          Private Residence
      </label>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2 form-check form-check-inline">
      <label class="form-check-label">
      @if(old('section_8') && old('section_8') == 1)
        <input class="form-check-input" type="checkbox" id="section_8" checked name="section_8" value="1">
      @elseif($income->section_8 == 1)
        <input class="form-check-input" type="checkbox" id="section_8" checked name="section_8" value="1">
      @else
        <input class="form-check-input" type="checkbox" id="section_8" name="section_8" value="1">
      @endif
         Section 8
      </label>
    </div>
    <div class="col-md-2 form-check form-check-inline">
      <label class="form-check-label">
      @if(old('arha') && old('arha') == 1)
        <input class="form-check-input" type="checkbox" id="arha" checked name="arha" value="1">
      @elseif($income->arha == 1)
        <input class="form-check-input" type="checkbox" id="arha" checked name="arha" value="1">
      @else
        <input class="form-check-input" type="checkbox" id="arha" name="arha" value="1">
      @endif
          ARHA
      </label>
    </div>
    <div class="col-md-2 form-check form-check-inline">
      <label class="form-check-label">
      @if(old('other') && old('other') == 1)
        <input class="form-check-input" type="checkbox" id="other" checked name="other" value="1">
      @elseif($income->other == 1)
        <input class="form-check-input" type="checkbox" id="other" checked name="other" value="1">
      @else
        <input class="form-check-input" type="checkbox" id="other" name="other" value="1">
      @endif
          Other
      </label>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="apartment_name">Apartment Complex Name</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="apartment_name" name="apartment_name" value="{{ old('apartment_name') ?? $income->apartment_name }}" />
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
            @elseif(($income ? $income->unemployed : '') == 1)
            <input type="radio" name="unemployed" id="unemployed_y" value="1" checked>
            @else
            <input type="radio" name="unemployed" id="unemployed_y" value="1">
            @endif
            Yes
        </label>
        <label class="btn btn-text">
            @if(old('unemployed') && old('unemployed' == '0'))
            <input type="radio" name="unemployed" id="unemployed_n" value="0" checked>
            @elseif(($income ? $income->unemployed : '') == 0)
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
            @elseif(($income ? $income->looking : '') == 1)
            <input type="radio" name="looking" id="looking_y" value="1" checked>
            @else
            <input type="radio" name="looking" id="looking_y" value="1">
            @endif
            Yes
        </label>
        <label class="btn btn-text">
            @if(old('looking') && old('looking' == '0'))
            <input type="radio" name="looking" id="looking_n" value="0" checked>
            @elseif(($income ? $income->looking : '') == 0)
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
        <textarea class="form-control" rows="5" id="applying" name="applying">{{ old('applying') ? old('applying') : ($income ? $income->applying : '') }}</textarea>
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
        <input type="number" min="0" class="form-control" id="{{ $field }}" name="{{ $field }}" value="{{ old($field) ? old($field) : ($income ? $income->$field : '') }}" />
    </div>
</div>
@endforeach


@section('custom-js')
<script>
    $income_fields = $('.income-form .glyphicon-usd').map(function(){
        var $element = $(this).closest(".input-group-addon").next('input').not('[readonly]');
        $element.on('change', function(){
            $("#monthly_income").val(calculateTotalIncome());
        });
        return $element;
    });

    function calculateTotalIncome() {
        return $income_fields.map(function(){
            return $(this).val();
        }).filter(function(){
            return $.isNumeric(this);
        }).toArray().reduce(function(total, current){
            return parseInt(total) + parseInt(current);
        });
    }
</script>
@endsection
