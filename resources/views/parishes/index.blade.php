@extends('layouts.app')

@section('content')
Parishes
<div class="panel">
    @include('partials.nav')
</div>

<div>
    @if($parishes->count())
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
    @endif
@endsection
