@extends('layouts.app')

@section('title')
| Log Turn Aways
@endsection

@section('content')
<h3>Log Turn Aways</h3>
<form style="margin:14px;" class="" method="post" action="{{ route('turn-aways.store') }}" autocomplete="off">
    {{ csrf_field() }}
    <div class="form-group row">
        <div class="col-md-2">
            <label for="date">Date</label>
        </div>
        <div class="col-md-2 input-group">
            <input type="text" class="form-control datepicker" id="date" name="date" data-provide="datepicker" value="{{ old('date') ?? $turn_away->date->format('m/d/Y') }}" />
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">
            <label for="middle_initial">Total</label>
        </div>
        <div class="col-md-1">
            <input type="text" class="form-control" id="total" name="total" maxlength="1000" value="{{ old('total') ?? ($turn_away->total ? $turn_away->total : '') }}" />
        </div>
    </div>
    <input type="submit" name="submit" value="Add Turn Aways" class="btn btn-primary" />
</form>
@endsection
