<div class="form-group row">
    <div class="col-md-2">
        <label for="date">Date</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control datepicker" id="date" name="date" data-provide="datepicker" value="{{ old('date') ?? ($client->date ? $client->date->format('m/d/Y') : Carbon\Carbon::now()->format('m/d/Y')) }}" />
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
        <label for="middle_initial">Middle Initial</label>
    </div>
    <div class="col-md-1">
        <input type="text" class="form-control" id="middle_initial" name="middle_initial" maxlength="1" value="{{ old('middle_initial') ?? ($client->contact ? $client->contact->middle_initial : '') }}" />
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
    <div class="col-md-2 form-check form-check-inline">
      <label class="form-check-label">
      @if(old('homeless') && old('homeless') == 1)
        <input class="form-check-input" type="checkbox" id="homeless"  checked name="homeless" value="1">
      @elseif($client->homeless == 1)
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
      @elseif($client->shelter == 1)
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
      @elseif($client->private_res == 1)
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
      @elseif($client->section_8 == 1)
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
      @elseif($client->arha == 1)
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
      @elseif($client->other == 1)
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
        <input type="text" class="form-control" id="apartment_name" name="apartment_name" value="{{ old('apartment_name') ?? $client->apartment_name }}" />
    </div>
</div>

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
        <input type="text" class="form-control" id="ethnicity" name="ethnicity" value="{{ old('ethnicity') ?? $client->ethnicity }}" />
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
        <label for="insurance_type">Medical Insurance?</label>
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" id="insurance_type" name="insurance_type" value="{{ old('insurance_type') ?? $client->insurance_type }}" />
    </div>
</div>
