@extends('layouts.app')

@section('content')
<h3>Clients</h3>
<a href="{{ route('clients.create') }}" class="btn btn-success">New Client</a>

<table class="table table-striped" style="width:500px;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td><a href="{{ route('clients.edit', $client->id) }}">{{ $client->name }}</a></td>
            <td>{{ $client->date->format('m/d/Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
