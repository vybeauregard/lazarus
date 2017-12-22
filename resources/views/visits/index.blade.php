@extends('layouts.app')

@section('content')
<h3>Visits</h3>
<a href="{{ route('visits.create') }}" class="btn btn-success">New Visit</a>

<table class="table table-striped" style="width:500px;">
    <thead>
        <tr>
            <th>Client</th>
            <th>Date</th>
            <th>Counselor</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
    @foreach($visits as $visit)
        <tr>
            <td>{{ $visit->client->name }}</td>
            <td>{{ $visit->date->format('m/d/Y') }}</td>
            <td>{{ $visit->counselor->name }}</td>
            <td>[[trash]]</td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
