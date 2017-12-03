@extends('layouts.app')

@section('content')
Counselors
<div class="panel">
    @include('partials.nav')
</div>

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
                <td>{{ $counselor }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
@endsection
