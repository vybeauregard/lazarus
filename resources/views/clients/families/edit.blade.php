@extends('layouts.app')

@section('content')
<h2>Update a Family Member for <a href="{{ route('clients.edit', $client->id) }}">{{ $client->contact->fullname }}</a></h2>

<form style="margin:14px;" class="" method="post" action="{{ route('clients.families.update', [$client->id, $family->id]) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    @include('clients.families.family', ['fam_id' => $family->id])
    <input type="submit" name="submit" value="Save Family Member" class="btn btn-primary" />
</form>
@endsection
