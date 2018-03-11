@extends('layouts.app')

@section('title')
| Visits {{ $visit->date->format('m/d/Y') }} | Requests | Add Request
@endsection

@section('content')
<h3>Add Request from {{ $visit->client->fullname }} on {{ $visit->date->format('m/d/Y') }}</h3>
<form style="margin:14px;" class="" method="post" action="{{ route('visits.requests.store', $visit->id) }}">
    {{ csrf_field() }}
@include('visits.requests.form')
    <input type="submit" class="btn btn-primary" value="Add Request" />
</form>
@endsection
