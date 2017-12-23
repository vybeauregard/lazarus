@extends('layouts.app')

@section('content')
<h3>Visit from {{ $visit->client->name }} <a href="{{ route('visits.edit', $visit->id) }}" class="glyphicon glyphicon-pencil no-underline"></a></h3>
@include('visits.readonly')
@endsection
