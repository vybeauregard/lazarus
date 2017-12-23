@extends('layouts.app')

@section('content')
<h2>Parish {{ $parish->name }}</h2>

<form style="margin:14px;" class="" method="post" action="{{ route('parishes.update', $parish->id) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    @include('parishes.form')

    <input type="submit" name="submit" value="Update Parish" class="btn btn-primary" />
</form>
@endsection
