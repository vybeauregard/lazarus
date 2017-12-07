<div class="form-group row">
    <div class="col-md-2">
        <label for="family_relationship_x">Relationship</label>
    </div>
    <div class="col-md-2">
        <select type="text" class="form-control" id="family_relationship_x"  name="family_relationship_x">
            @foreach(["spouse", "child", "other adult"] as $type)
            <option selected value="{{ str_replace(' ', '_', $type) }}">{{ $type }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
    </div>
    <div class="col-md-5">
    <p class="small"><i class="glyphicon glyphicon-exclamation-sign"></i> Child must be under 18 years old.</p>
    <p class="small"><i class="glyphicon glyphicon-exclamation-sign"></i><i class="glyphicon glyphicon-exclamation-sign"></i> List adult children (18 and older) under "Other Adults"</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="family_name_x">Name</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" rows="5" id="family_name_x" name="family_name_x" value="{{ old('family_name_x') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="family_dob_month_x">Date of Birth</label>
    </div>
    <div class="col-md-2">
        <select type="text" class="form-control" id="family_dob_month_x" placeholder="Month" name="family_dob_month_x">
            @foreach(['Select a Month', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $index => $month)
            <option {{ $loop->first ? 'disabled selected' : (old('family_dob_month_x') == str_pad($index, 2, '0', STR_PAD_LEFT) ? 'selected' : '') }} value="{{ str_pad($index, 2, '0', STR_PAD_LEFT) }}">{{ $month }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-1">
        <select type="text" class="form-control" id="family_dob_day_x" placeholder="Day" name="family_dob_day_x">
            @foreach(range(1, 31) as $day)
            @if(old('family_dob_day_x') && old('dob_day') == str_pad($day, 2, '0', STR_PAD_LEFT))
            <option selected value="{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}">{{ $day }}</option>
            @else
            <option value="{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}">{{ $day }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <select type="text" class="form-control" id="family_dob_year_x" placeholder="Year" name="family_dob_year_x">
            @foreach(range(1900, date('Y')) as $year)
            @if(old('family_dob_year_x'))
            <option value="{{ $year }}" {{ old('family_dob_year_x') == $year ? 'selected' : '' }}>{{ $year }}</option>
            @else
            <option value="{{ $year }}" {{ $loop->last ? 'selected' : '' }}>{{ $year }}</option>
            @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="family_sex_x">Sex</label>
    </div>
    <div class="col-md-2 btn-group" data-toggle="radio">
        <label class="btn btn-text">
            <input type="radio" name="family_sex_x" id="family_sex_f_x"> Female
        </label>
        <label class="btn btn-text">
            <input type="radio" name="family_sex_x" id="family_sex_m_x"> Male
        </label>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="family_birth_country_x">Country of Birth</label>
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" id="family_birth_country_x" name="family_birth_country_x" value="{{ old('family_birth_country_x') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="family_insurance_type_x">Medical Insurance?</label>
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" id="family_insurance_type_x" name="family_insurance_type_x" value="{{ old('family_insurance_type_x') }}" />
    </div>
</div>
