@extends('layouts.app')

@section('content')
<div class="panel">
    @include('partials.nav')
</div>
<h3>Parishes</h3>
<a href="{{ route('parishes.create') }}" class="btn btn-success">New Parish</a>

<table class="table">
    <thead>
        <tr>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($parishes as $parish)
        <tr>
            <td>{{ $parish }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
