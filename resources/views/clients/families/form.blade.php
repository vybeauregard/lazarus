<div class="family-form" data-id="{{ $family->id ?? 0 }}">
    <div class="form-group row">
        <div class="col-md-2">
            <label for="relationship">Relationship</label>
        </div>
        <div class="col-md-2">
            <select type="text" class="form-control" id="relationship"  name="relationship">
                @foreach(["spouse", "child", "other adult"] as $type)
                    @if(old('relationship') == str_replace(' ', '_', $type))
                        <option selected value="{{ str_replace(' ', '_', $type) }}">{{ $type }}</option>
                    @elseif($family->relationship == str_replace(' ', '_', $type))
                        <option selected value="{{ str_replace(' ', '_', $type) }}">{{ $type }}</option>
                    @else
                        <option value="{{ str_replace(' ', '_', $type) }}">{{ $type }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="name">Name</label>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" rows="5" id="name" name="name" value="{{ old('name') ?? $family->name }}" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="dob_month">Date of Birth</label>
        </div>
        <div class="col-md-2">
            <select type="text" class="form-control" id="dob_month" placeholder="Month" name="dob_month">
                @foreach(['Select a Month', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $index => $month)
                @if(!old('dob_month') && !$family->dob)
                <option {{ $loop->first ? 'disabled selected' : '' }} value="{{ str_pad($index, 2, '0', STR_PAD_LEFT) }}">{{ $month }}</option>
                @else
                <option {{ $loop->first ? 'disabled selected' : (old('dob_month') ?? $family->dob->format('m') == str_pad($index, 2, '0', STR_PAD_LEFT) ? 'selected' : '') }} value="{{ str_pad($index, 2, '0', STR_PAD_LEFT) }}">{{ $month }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="col-md-1">
            <select type="text" class="form-control" id="dob_day" placeholder="Day" name="dob_day">
                @foreach(range(1, 31) as $day)
                @if(old('dob_month') || $family->dob)
                    @if(old('dob_day') ?? $family->dob->format('d') == str_pad($day, 2, '0', STR_PAD_LEFT))
                    <option selected value="{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}">{{ $day }}</option>
                    @else
                    <option value="{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}">{{ $day }}</option>
                    @endif
                @else
                <option value="{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}">{{ $day }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <select type="text" class="form-control" id="dob_year" placeholder="Year" name="dob_year">
                @foreach(range(1900, date('Y')) as $year)
                @if(old('dob_year') ?? $family->relationship)
                <option value="{{ $year }}" {{ old('dob_year') ?? $family->dob->format('Y') == $year ? 'selected' : '' }}>{{ $year }}</option>
                @else
                <option value="{{ $year }}" {{ $loop->last ? 'selected' : '' }}>{{ $year }}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">
            <label for="sex">Sex</label>
        </div>
        <div class="col-md-2 btn-group" data-toggle="radio">
            <label class="btn btn-text">
                <input type="radio" name="sex" id="sex_f" value="f" {{ old('sex') ?? $family->sex == 'f' ? 'checked' : '' }}> Female
            </label>
            <label class="btn btn-text">
                <input type="radio" name="sex" id="sex_m" value="m" {{ old('sex') ?? $family->sex == 'm' ? 'checked' : '' }}> Male
            </label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="birth_country">Country of Birth</label>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="birth_country" name="birth_country" value="{{ old('birth_country') ?? $family->birth_country }}" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="insurance">Medical Insurance?</label>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="insurance" name="insurance" value="{{ old('insurance') ?? $family->insurance }}" />
        </div>
    </div>
</div>
<hr />
