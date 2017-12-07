@extends('layouts.app')

@section('content')

<div class="panel">
    @include('partials.nav')
</div>
@include('partials.errors')
<h3>Create a new Client</h3>
<form style="margin:14px;" class="" method="post" action="{{ route('clients.store') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="form-group row">
        <div class="col-md-2">
            <label for="date">Date</label>
        </div>
        <div class="col-md-2 input-group">
            <input type="text" class="form-control datepicker" id="date" name="date" data-provide="datepicker" value="{{ old('date') ? old('date') : Carbon\Carbon::now()->format('m/d/Y') }}" />
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
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="middle_initial">Middle Initial</label>
        </div>
        <div class="col-md-1">
            <input type="text" class="form-control" id="middle_initial" name="middle_initial" maxlength="1" value="{{ old('middle_initial') }}" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="last_name">Last Name</label>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="address_1">Address 1</label>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" id="address_1" name="address_1" value="{{ old('address_1') }}" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="address_2">Address 2</label>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" id="address_2" name="address_2" value="{{ old('address_2') }}" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="city">City</label>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="state">State</label>
        </div>
        <div class="col-md-2">
            <select class="form-control" id="state" name="state">
                <option disabled {{ old('state') ? '' : 'selected' }}>Select a State</option>
                @foreach($states as $code => $state)
                <option value="{{ $code }}" {{ old('state') == $code ? 'selected' : '' }}>{{ $state }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="zip">Zip</label>
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" id="zip" name="zip" value="{{ old('zip') }}" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2 form-check form-check-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="homeless" {{ old('homeless') == 1 ? 'checked' : '' }} name="homeless" value="1"> Homeless
          </label>
        </div>
        <div class="col-md-2 form-check form-check-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="shelter" {{ old('shelter') == 1 ? 'checked' : '' }} name="shelter" value="1"> Shelter
          </label>
        </div>
        <div class="col-md-2 form-check form-check-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="private_res" {{ old('private_res') == 1 ? 'checked' : '' }} name="private_res" value="1"> Private Residence
          </label>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2 form-check form-check-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="section_8" {{ old('section_8') == 1 ? 'checked' : '' }} name="section_8" value="1"> Section 8
          </label>
        </div>
        <div class="col-md-2 form-check form-check-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="arha" {{ old('arha') == 1 ? 'checked' : '' }} name="arha" value="1"> ARHA
          </label>
        </div>
        <div class="col-md-2 form-check form-check-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="other" {{ old('other') == 1 ? 'checked' : '' }} name="other" value="1"> Other
          </label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="apartment_name">Apartment Complex Name</label>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" id="apartment_name" name="apartment_name" value="{{ old('apartment_name') }}" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="phone">Phone Number</label>
        </div>
        <div class="col-md-2 input-group">
            <input type="text" class="form-control bfh-phone" id="phone" name="phone" data-format="(ddd) ddd-dddd" value="{{ old('phone') }}">
            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="emergency_phone">Emergency Contact Number</label>
        </div>
        <div class="col-md-2 input-group">
            <input type="text" class="form-control bfh-phone" id="emergency_phone" name="emergency_phone" data-format="(ddd) ddd-dddd" value="{{ old('emergency_phone') }}">
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
                <option {{ $loop->first ? 'disabled selected' : (old('dob_month') == str_pad($index, 2, '0', STR_PAD_LEFT) ? 'selected' : '') }} value="{{ str_pad($index, 2, '0', STR_PAD_LEFT) }}">{{ $month }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-1">
            <select type="text" class="form-control" id="dob_day" placeholder="Day" name="dob_day">
                @foreach(range(1, 31) as $day)
                @if(old('dob_day') && old('dob_day') == str_pad($day, 2, '0', STR_PAD_LEFT))
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
                @if(old('dob_year'))
                <option value="{{ $year }}" {{ old('dob_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                @else
                <option value="{{ $year }}" {{ $loop->last ? 'selected' : '' }}>{{ $year }}</option>
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
            <input type="text" class="form-control" id="gender" name="gender" value="{{ old('gender') }}" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="ethnicity">Ethnicity</label>
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" id="ethnicity" name="ethnicity" value="{{ old('ethnicity') }}" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="birth_country">Country of Birth</label>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="birth_country" name="birth_country" value="{{ old('birth_country') }}" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="veteran_status">Veteran Status</label>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="veteran_status" name="veteran_status" value="{{ old('veteran_status') }}" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="incarceration">Incarceration History (if any)</label>
        </div>
        <div class="col-md-5">
            <textarea class="form-control" rows="5" id="incarceration" name="incarceration">{{ old('incarceration') }}</textarea>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="insurance_type">Medical Insurance?</label>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="insurance_type" name="insurance_type" value="{{ old('insurance_type') }}" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="monthly_income">Total Monthly Income</label>
        </div>
        <div class="col-md-3 input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
            <input type="text" class="form-control" id="monthly_income" name="monthly_income" value="{{ old('monthly_income') }}" />
        </div>
    </div>
<hr />
    @include('clients.employment')
<hr />
    @include('clients.family')

    <input type="submit" name="submit" value="Save" class="btn btn-primary" />
</form>
@endsection

@section('custom-css')
    <link href="{{ asset('css/bootstrap-formhelpers.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection

@section('custom-js')
    <script src="{{ asset('js/bootstrap-formhelpers.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $("document").ready(function(){
            if ("{{ old('phone') }}" == "") {
                $("#phone").val('');
            }
            if ("{{ old('emergency_phone') }}" == "") {
                $("#emergency_phone").val('');
            }
            $(".datepicker").datepicker({todayHighlight: true})
        });
        $(".input-group-addon").on('click', function(){
            $(this).prev('input').focus();
        });
    </script>
@endsection
