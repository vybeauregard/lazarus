@extends('layouts.app')

@section('title')
| Loans | Edit {{ $loan->client->name }}
@endsection

@section('content')
<h2>Edit Loan for {{ $loan->client->name }}</h2>

<form style="margin:14px;" class="" method="post" action="{{ route('loans.update', $loan->id) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    @include('loans.form')
    <input type="submit" name="submit" value="Save Loan" class="btn btn-primary" />
</form>
@endsection
