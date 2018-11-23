@extends('layouts.app')

@section('title')
| Log Turn Aways
@endsection

@section('content')
<h3>Log Turn Aways</h3>
<form style="margin:14px;" class="" method="post" action="{{ route('turn-aways.store') }}">
    {{ csrf_field() }}
    @include('turn-aways.form')
    <input type="submit" name="submit" value="Add Turn Aways" class="btn btn-primary" />
</form>
@endsection
