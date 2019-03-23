@extends('layouts.app')

@section('title')
| Counselors | Edit {{ $counselor->name }}
@endsection

@section('content')
<h2>Counselor {{ $counselor->name }}</h2>

<form style="margin:14px;" class="" method="post" action="{{ route('counselors.update', $counselor->id) }}" autocomplete="off">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    @include('counselors.form')

    <input type="submit" name="submit" value="Update Counselor" class="btn btn-primary" />
</form>
@endsection
