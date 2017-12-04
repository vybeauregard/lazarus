@extends('layouts.app')

@section('content')
<div class="panel">
    @include('partials.nav')
</div>
<h3>Clients</h3>
<a href="{{ route('clients.create') }}" class="btn btn-success">New Client</a>

<table class="table">
    <thead>
        <tr>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <td>{{ $client }}</td>
    @endforeach
    </tbody>
</table>
@endsection
