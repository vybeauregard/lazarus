@extends('layouts.app')

@section('title')
| Programs | Add Program
@endsection

@section('content')
<h3>Add a new Program</h3>
<form style="margin:14px;" class="" method="post" action="{{ route('programs.store') }}">
    {{ csrf_field() }}
    {{ method_field('POST') }}
@include('programs.form')
    <input type="submit" class="btn btn-primary" value="Add Program" />
</form>
@endsection
