@extends('layouts.app')

@section('title')
| Visits | Edit {{ $visit->client->name }} {{ $visit->date->format('m/d/Y') }}
@endsection

@section('content')
<h3>Edit Visit from {{ $visit->client->name }}</h3>
<form style="margin:14px;" class="" method="post" action="{{ route('visits.update', $visit->id) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
@include('visits.form')
    <input type="submit" class="btn btn-primary" value="Save Visit" />
</form>
@endsection
