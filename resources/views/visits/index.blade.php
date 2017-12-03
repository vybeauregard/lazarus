@extends('layouts.app')

@section('content')
Visits
<div class="panel">
    @include('partials.nav')
</div>

<div>
    @if($visits->count())
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
    @endif
</div>

@endsection
