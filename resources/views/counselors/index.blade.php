@extends('layouts.app')

@section('content')
<div class="panel">
    @include('partials.nav')
</div>
<h3>Counselors</h3>

<a href="{{ route('counselors.create') }}" class="btn btn-success">New Counselor</a>
<div>
    @if($counselors->count())
    <table class="table">
        <thead>
            <tr>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($counselors as $counselor)
            <tr>
                <td>{{ $counselor->contact->fullName }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
@endsection
