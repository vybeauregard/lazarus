@extends('layouts.app')

@section('title')
| Visits | Add Visit
@endsection

@section('content')
<h3>Add a new Visit</h3>
<form style="margin:14px;" class="" method="post" action="{{ route('visits.store') }}" autocomplete="off">
    {{ csrf_field() }}
    {{ method_field('POST') }}
@include('visits.form')
    <input type="submit" name="submit" value="Add Visit and Add Request" class="btn btn-success" />
</form>
@endsection
