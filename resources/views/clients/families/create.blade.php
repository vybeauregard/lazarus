@extends('layouts.app')

@section('content')
<h2>Add a Family Member for <a href="{{ route('clients.edit', $client->id) }}">{{ $client->contact->fullname }}</a></h2>

<form style="margin:14px;" class="" method="post" action="{{ route('clients.families.store', $client->id) }}">
    {{ csrf_field() }}
    @include('clients.families.form')
    <input type="submit" name="submit" value="Add Family Member" class="btn btn-primary" />
</form>
@endsection
