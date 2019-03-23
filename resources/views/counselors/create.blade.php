@extends('layouts.app')

@section('title')
| Counselors | Add Counselor
@endsection

@section('content')
<h2>Add a Counselor</h2>

<form style="margin:14px;" class="" method="post" action="{{ route('counselors.store') }}" autocomplete="off">
    {{ csrf_field() }}
    @include('counselors.form')
    <input type="submit" name="submit" value="Add Counselor" class="btn btn-primary" />
</form>
@endsection
