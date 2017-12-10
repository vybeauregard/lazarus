@extends('layouts.app')

@section('content')
<div class="panel">
    @include('partials.nav')
</div>
<h3>Loans</h3>
<a href="{{ route('loans.create') }}" class="btn btn-success">New Loan</a>

<table class="table">
    <thead>
        <tr>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($loans as $loan)
        <tr>
            <td>{{ $loan }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
