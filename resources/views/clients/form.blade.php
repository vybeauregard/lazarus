<div class="form-group row">
    <div class="col-md-2">
        <label for="date">Date</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control datepicker" id="date" name="date_{{ csrf_token() }}" data-provide="datepicker" value="{{ old('date') ?? ($client->date ? $client->date->format('m/d/Y') : Carbon\Carbon::now()->format('m/d/Y')) }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    </div>
    <div class="col-md-2">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="first_name">First Name</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') ?? ($client->contact ? $client->contact->first_name : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="middle_name">Middle Name</label>
    </div>
    <div class="col-md-2">
        <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name') ?? ($client->contact ? $client->contact->middle_name : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="last_name">Last Name</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') ?? ($client->contact ? $client->contact->last_name : '') }}" />
    </div>
</div>

@include('layouts.address', ['model' => $client])

<div class="form-group row">
    <div class="col-md-2">
        <label for="phone">Phone Number</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="tel" class="form-control bfh-phone" id="phone" name="phone" data-format="(ddd) ddd-dddd" value="{{ old('phone') ?? ($client->contact ? $client->contact->phone : '') }}">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="emergency_phone">Emergency Contact Number</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="tel" class="form-control bfh-phone" id="emergency_phone" name="emergency_phone" data-format="(ddd) ddd-dddd" value="{{ old('emergency_phone') ?? ($client->contact ? $client->contact->emergency_phone : '') }}">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="dob_month">Date of Birth</label>
    </div>
    <div class="col-md-2">
        <select type="text" class="form-control" id="dob_month" placeholder="Month" name="dob_month">
            @foreach(['Select a Month', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $index => $month)
                @if(old('dob_month') && old('dob_month') == str_pad($index, 2, '0', STR_PAD_LEFT))
                <option value="{{ str_pad($index, 2, '0', STR_PAD_LEFT) }}" selected {{ $loop->first ? 'disabled' : '' }}>{{ $month }}</option>
                @elseif($client->dob && $client->dob->format('m') == str_pad($index, 2, '0', STR_PAD_LEFT))
                <option value="{{ str_pad($index, 2, '0', STR_PAD_LEFT) }}" selected {{ $loop->first ? 'disabled' : '' }}>{{ $month }}</option>
                @elseif(!old('dob_month') && !$client->dob)
                <option value="{{ str_pad($index, 2, '0', STR_PAD_LEFT) }}" {{ $loop->first ? 'selected disabled' : '' }}>{{ $month }}</option>
                @else
                <option value="{{ str_pad($index, 2, '0', STR_PAD_LEFT) }}" {{ $loop->first ? 'disabled' : '' }}>{{ $month }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="col-md-1">
        <select type="text" class="form-control" id="dob_day" placeholder="Day" name="dob_day">
            @foreach(range(1, 31) as $day)
            @if(old('dob_day') && old('dob_day') == str_pad($day, 2, '0', STR_PAD_LEFT))
            <option selected value="{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}">{{ $day }}</option>
            @elseif($client->dob && $client->dob->format('d') == str_pad($day, 2, '0', STR_PAD_LEFT))
            <option selected value="{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}">{{ $day }}</option>
            @else
            <option value="{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}">{{ $day }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <select type="text" class="form-control" id="dob_year" placeholder="Year" name="dob_year">
            @foreach(range(1900, date('Y')) as $year)
            @if(old('dob_year') && old('dob_year') == $year)
            <option value="{{ $year }}" selected>{{ $year }}</option>
            @elseif($client->dob && $client->dob->format('Y') == $year)
            <option value="{{ $year }}" selected>{{ $year }}</option>
            @elseif(!old('dob_year') && !$client->dob)
            <option value="{{ $year }}" {{ $loop->last ? 'selected' : '' }}>{{ $year }}</option>
            @else
            <option value="{{ $year }}">{{ $year }}</option>
            @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="gender">Gender</label>
    </div>
    <div class="col-md-1">
        <input type="text" class="form-control" id="gender" name="gender" value="{{ old('gender') ?? $client->gender }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="ethnicity">Ethnicity</label>
    </div>
    <div class="col-md-2">
        <select id="ethnicity" name="ethnicity" class="form-control">
            <option disabled selected>Choose an ethnicity</option>
            @foreach($ethnicities as $ethnicity)
            <option value="{{ $ethnicity }}" {{ $ethnicity == $client->ethnicity ? 'selected' : '' }}>{{ $ethnicity }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="birth_country">Country of Birth</label>
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" id="birth_country" name="birth_country" value="{{ old('birth_country') ?? $client->birth_country }}" />
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        <label for="veteran_status">Veteran Status</label>
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" id="veteran_status" name="veteran_status" value="{{ old('veteran_status') ?? $client->veteran_status }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="incarceration">Incarceration History (if any)</label>
    </div>
    <div class="col-md-5">
        <textarea class="form-control" rows="5" id="incarceration" name="incarceration">{{ old('incarceration') ?? $client->incarceration }}</textarea>
    </div>
</div>


<div class="form-group row">
    <div class="col-md-2">
        <label for="insurance">Medical Insurance?</label>
    </div>
    <div class="col-md-2 btn-group" data-toggle="radio">
        <label class="btn btn-text">
            <input type="radio" name="insurance" id="insurance_y" value="y" {{ old('insurance') ?? $client->insurance == 'y' ? 'checked' : '' }}> Yes
        </label>
        <label class="btn btn-text">
            <input type="radio" name="insurance" id="insurance_n" value="n" {{ old('insurance') ?? $client->insurance == 'n' ? 'checked' : '' }}> No
        </label>
    </div>
</div>


<div class="form-group row">
    <div class="col-md-2">
        <label for="source">Source</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="source" name="source" value="{{ old('source') ?? $client->source }}" />
    </div>
</div>
