@extends('layouts.app')

@section('content')
<h2>Add a Family Member for <a href="{{ route('clients.edit', $client->id) }}">{{ $client->contact->fullname }}</a></h2>

<form style="margin:14px;" class="" method="post" action="{{ route('clients.families.store', $client->id) }}">
    @include('clients.family', ['fam_id' => 0])
    <input type="submit" name="submit" value="Save" class="btn btn-primary" />
</form>
@endsection
