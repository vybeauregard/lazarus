@extends('layouts.app')

@section('content')
<h2>Add a Parish</h2>

<form style="margin:14px;" class="" method="post" action="{{ route('parishes.store') }}">
    {{ csrf_field() }}
    @include('parishes.form')
    <input type="submit" name="submit" value="Add Parish" class="btn btn-primary" />
</form>
@endsection
