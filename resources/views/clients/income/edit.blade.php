@extends('layouts.app')

@section('content')
<h2>Update Income data for <a href="{{ route('clients.edit', $client->id) }}">{{ $client->contact->fullname }}</a></h2>

<form style="margin:14px;" class="income-form" method="post" action="{{ route('clients.income.update', [$client->id, $income->id]) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    @include('clients.income.form', ['income_id' => $income->id])
    <input type="submit" name="submit" value="Save Income Data" class="btn btn-success" />
</form>
@endsection
