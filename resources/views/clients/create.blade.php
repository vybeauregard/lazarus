@extends('layouts.app')

@section('content')
<div class="panel">
    @include('partials.nav')
</div>
<h3>Create a new Client</h3>
<form style="margin:14px;" class="">
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
        <div class="form-check form-check-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="homeless"> Homeless
          </label>
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="shelter"> Shelter
          </label>
        </div>
        <div class="form-check form-check-inline disabled">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="private_res" disabled> Private Residence
          </label>
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="section_8"> Section 8
          </label>
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="arha"> ARHA
          </label>
        </div>
        <div class="form-check form-check-inline disabled">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="other" disabled> Other
          </label>
        </div>






    </div>
    <input type="submit" name="submit" value="Save" class="btn btn-primary" />
</form>
@endsection
