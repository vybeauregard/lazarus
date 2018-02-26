@extends('layouts.app')

@section('content')
<h2>Add Income data for <a href="{{ route('clients.edit', $client->id) }}">{{ $client->contact->fullname }}</a></h2>

<form style="margin:14px;" class="" method="post" action="{{ route('clients.income.store', $client->id) }}">
    {{ csrf_field() }}
    @include('clients.income.form')
    <input type="submit" name="submit" value="Add Income Data" class="btn btn-primary" />
</form>
@endsection
