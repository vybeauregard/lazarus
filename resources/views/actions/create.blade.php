@extends('layouts.app')

@section('title')
| Actions | Add Action
@endsection

@section('content')
<h2>Add a new Action</h2>
<form style="margin:14px;" class="" method="post" action="{{ route('actions.store') }}" autocomplete="off">
    {{ csrf_field() }}
<hr />
    <div class="form-group row">
        <div class="col-md-2">
            <label for="type">Type</label>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" rows="5" id="type" name="type" value="{{ old('type') ?? $action->type }}" />
        </div>
    </div>

    <input type="submit" name="submit" value="Add Action" class="btn btn-primary" />
</form>
@endsection
