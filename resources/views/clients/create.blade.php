@extends('layouts.app')

@section('content')
<div class="panel">
    @include('partials.nav')
</div>
<h3>Create a new Client</h3>
<form style="margin:14px;" class="">
    <div class="form-group row">
        <div class="col-md-2">
            <label for="date">Date</label>
        </div>
        <div class="col-md-2 input-group">
            <input type="text" class="form-control datepicker" id="date" name="date" data-provide="datepicker" value="{{ Carbon\Carbon::now()->format('m/d/Y') }}" />
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </div>
        <div class="col-md-2">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="last_name">Last Name</label>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" id="last_name" name="last_name" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="first_name">First Name</label>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" id="first_name" name="first_name" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="middle_initial">Middle Initial</label>
        </div>
        <div class="col-md-1">
            <input type="text" class="form-control" id="middle_initial" name="middle_initial" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="address_1">Address 1</label>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" id="address_1" name="address_1" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="address_2">Address 2</label>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" id="address_2" name="address_2" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="city">City</label>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" id="city" name="city" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="state">State</label>
        </div>
        <div class="col-md-2">
            <select class="form-control" id="state" name="state">
                <option disabled selected>Select a State</option>
                @foreach($states as $code => $state)
                <option value="{{ $code}}">{{ $state }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="zip">Zip</label>
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" id="zip" name="zip" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2 form-check form-check-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="status1" name="status" value="homeless"> Homeless
          </label>
        </div>
        <div class="col-md-2 form-check form-check-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="status2" name="status" value="shelter"> Shelter
          </label>
        </div>
        <div class="col-md-2 form-check form-check-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="status3" name="status" value="private_res"> Private Residence
          </label>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2 form-check form-check-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="status4" name="status" value="section_8"> Section 8
          </label>
        </div>
        <div class="col-md-2 form-check form-check-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="status5" name="status" value="arha"> ARHA
          </label>
        </div>
        <div class="col-md-2 form-check form-check-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="status6" name="status" value="other"> Other
          </label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="apartment_name">Apartment Complex Name</label>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" id="apartment_name" name="apartment_name" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="phone">Phone Number</label>
        </div>
        <div class="col-md-2 input-group">
            <input type="text" class="form-control bfh-phone" id="phone" name="phone" data-format="(ddd) ddd-dddd">
            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="emergency_phone">Emergency Contact Number</label>
        </div>
        <div class="col-md-2 input-group">
            <input type="text" class="form-control bfh-phone" id="emergency_phone" name="emergency_phone" data-format="(ddd) ddd-dddd">
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
                <option {{ $loop->first ? 'disabled selected' : '' }} value="{{ $index }}">{{ $month }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-1">
            <select type="text" class="form-control" id="dob_day" placeholder="Day" name="dob_day">
                @foreach(range(1, 31) as $day)
                <option value="{{ $day }}">{{ $day }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <select type="text" class="form-control" id="dob_year" placeholder="Year" name="dob_year">
                @foreach(range(1900, date('Y')) as $day)
                <option value="{{ $day }}" {{ $loop->last ? 'selected' : '' }}>{{ $day }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="gender">Gender</label>
        </div>
        <div class="col-md-1">
            <input type="text" class="form-control" id="gender" name="gender" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="ethnicity">Ethnicity</label>
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" id="ethnicity" name="ethnicity" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="birth_country">Country of Birth</label>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="birth_country" name="birth_country" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="veteran_status">Veteran Status</label>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="veteran_status" name="veteran_status" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="incarceration">Incarceration History (if any)</label>
        </div>
        <div class="col-md-5">
            <textarea class="form-control" rows="5" id="incarceration" name="incarceration"></textarea>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="insurance">Do you have medical Insurance?</label>
        </div>
        <div class="col-md-5">
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="insurance" id="insurance1" value="1"> Yes
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="insurance" id="insurance2" value="0"> No
              </label>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="insurance_type">If yes, what type</label>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="insurance_type" name="insurance_type" />
        </div>
    </div>


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
            $(".bfh-phone").val('');
            $(".datepicker").datepicker({todayHighlight: true})
        });
        $(".input-group-addon").on('click', function(){
            $(this).prev('input').focus();
        });
    </script>
@endsection
