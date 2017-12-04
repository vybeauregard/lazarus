@extends('layouts.app')

@section('content')
<div class="panel">
    @include('partials.nav')
</div>
<h3>Visits</h3>
<a href="{{ route('visits.create') }}" class="btn btn-success">New Visit</a>

<table class="table">
    <thead>
        <tr>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($visits as $visit)
        <tr>
            <td>{{ $visit }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
