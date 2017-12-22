@extends('layouts.app')

@section('content')
<h3>Add a new Visit</h3>
<form style="margin:14px;" class="" method="post" action="{{ route('visits.create') }}">
    {{ csrf_field() }}
    {{ method_field('POST') }}
@include('visits.form')
    <input type="submit" class="btn btn-primary" value="Add Visit" />
</form>
@endsection
