@extends('layouts.app')

@section('title')
| Programs | Edit {{ $program->name }}
@endsection

@section('content')
<h3>Edit Program {{ $program->name }}</h3>
<form style="margin:14px;" class="" method="post" action="{{ route('programs.update', $program->id) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
@include('programs.form')
    <input type="submit" class="btn btn-primary" value="Save Program" />
</form>
@endsection
