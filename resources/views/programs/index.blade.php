@extends('layouts.app')

@section('title')
| Programs
@endsection

@section('content')
<h3>Programs</h3>
<a href="{{ route('programs.create') }}" class="btn btn-success">New Program</a>

<table class="table">
    <thead>
        <tr>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($programs as $program)
        <tr>
            <td>{{ $program }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
