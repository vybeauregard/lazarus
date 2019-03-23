@extends('layouts.app')

@section('title')
| Visits {{ $visit->date->format('m/d/Y') }} | Requests | Edit {{ $request->formattedType }}
@endsection

@section('content')
<h3>Edit {{ $request->formattedType }} Request from {{ $visit->client->fullname }} on {{ $visit->date->format('m/d/Y') }}</h3>
<form style="margin:14px;" class="" method="post" action="{{ route('visits.requests.update', [$visit->id, $request->id]) }}" autocomplete="off">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
@include('visits.requests.form')
    <input type="submit" class="btn btn-primary" value="Save Request" />
</form>
@endsection
