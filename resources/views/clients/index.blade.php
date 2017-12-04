@extends('layouts.app')

@section('content')
Clients
<div class="panel">
    @include('partials.nav')
</div>
<a href="{{ route('clients.create') }}">New Client</a>
@endsection
