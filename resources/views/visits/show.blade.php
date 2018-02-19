@extends('layouts.app')

@section('title')
| Visits | {{ $visit->client->name }} {{ $visit->date->format('m/d/Y') }}
@endsection

@section('content')
<h3>Visit from {{ $visit->client->name }} <a href="{{ route('visits.edit', $visit->id) }}" class="oi oi-pencil no-underline"></a></h3>
@include('visits.readonly')
@endsection
