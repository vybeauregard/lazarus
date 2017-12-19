<div class="family-form" data-id="{{ $fam_id }}">
    <div class="form-group row">
        <div class="col-md-2">
            <label for="family_relationship_{{ $fam_id }}">Relationship</label>
        </div>
        <div class="col-md-2">
            <select type="text" class="form-control" id="family_relationship_{{ $fam_id }}"  name="family_relationship_{{ $fam_id }}">
                @foreach(["spouse", "child", "other adult"] as $type)
                <option {{ old('family_relationship_' . $fam_id) == $type ? 'selected' : ''}} value="{{ str_replace(' ', '_', $type) }}">{{ $type }}</option>
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
            <label for="family_name_{{ $fam_id }}">Name</label>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" rows="5" id="family_name_{{ $fam_id }}" name="family_name_{{ $fam_id }}" value="{{ old('family_name_' . $fam_id) }}" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="family_dob_month_{{ $fam_id }}">Date of Birth</label>
        </div>
        <div class="col-md-2">
            <select type="text" class="form-control" id="family_dob_month_{{ $fam_id }}" placeholder="Month" name="family_dob_month_{{ $fam_id }}">
                @foreach(['Select a Month', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $index => $month)
                <option {{ $loop->first ? 'disabled selected' : (old('family_dob_month_' . $fam_id) == str_pad($index, 2, '0', STR_PAD_LEFT) ? 'selected' : '') }} value="{{ str_pad($index, 2, '0', STR_PAD_LEFT) }}">{{ $month }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-1">
            <select type="text" class="form-control" id="family_dob_day_{{ $fam_id }}" placeholder="Day" name="family_dob_day_{{ $fam_id }}">
                @foreach(range(1, 31) as $day)
                @if(old('family_dob_day_' . $fam_id) == str_pad($day, 2, '0', STR_PAD_LEFT))
                <option selected value="{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}">{{ $day }}</option>
                @else
                <option value="{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}">{{ $day }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <select type="text" class="form-control" id="family_dob_year_{{ $fam_id }}" placeholder="Year" name="family_dob_year_{{ $fam_id }}">
                @foreach(range(1900, date('Y')) as $year)
                @if(old('family_dob_year_' . $fam_id))
                <option value="{{ $year }}" {{ old('family_dob_year_' . $fam_id) == $year ? 'selected' : '' }}>{{ $year }}</option>
                @else
                <option value="{{ $year }}" {{ $loop->last ? 'selected' : '' }}>{{ $year }}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">
            <label for="family_sex_{{ $fam_id }}">Sex</label>
        </div>
        <div class="col-md-2 btn-group" data-toggle="radio">
            <label class="btn btn-text">
                <input type="radio" name="family_sex_{{ $fam_id }}" id="family_sex_f_{{ $fam_id }}" value="f" {{ old('family_sex_' . $fam_id) == 'f' ? 'checked' : '' }}> Female
            </label>
            <label class="btn btn-text">
                <input type="radio" name="family_sex_{{ $fam_id }}" id="family_sex_m_{{ $fam_id }}" value="m" {{ old('family_sex_' . $fam_id) == 'm' ? 'checked' : '' }}> Male
            </label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="family_birth_country_{{ $fam_id }}">Country of Birth</label>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="family_birth_country_{{ $fam_id }}" name="family_birth_country_{{ $fam_id }}" value="{{ old('family_birth_country_' . $fam_id) }}" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="family_insurance_type_{{ $fam_id }}">Medical Insurance?</label>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="family_insurance_type_{{ $fam_id }}" name="family_insurance_type_{{ $fam_id }}" value="{{ old('family_insurance_type_' . $fam_id) }}" />
        </div>
    </div>
</div>
<hr />
