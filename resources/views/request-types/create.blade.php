@extends('layouts.app')

@section('title')
| Request Types | Add Request Type
@endsection

@section('content')
<h2>Add a new Request Type</h2>
<form style="margin:14px;" class="" method="post" action="{{ route('request-types.store') }}" autocomplete="off">
    {{ csrf_field() }}
<hr />
    <div class="form-group row">
        <div class="col-md-2">
            <label for="type">Type</label>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" rows="5" id="type" name="type" value="{{ old('type') ?? $requestType->type }}" />
        </div>
    </div>

    <input type="submit" name="submit" value="Add Request Type" class="btn btn-primary" />
</form>
@endsection
