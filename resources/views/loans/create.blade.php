@extends('layouts.app')

@section('content')
<h2>Add a Loan</h2>

<form style="margin:14px;" class="" method="post" action="{{ route('loans.store') }}">
    {{ csrf_field() }}
    @include('loans.form')
    <input type="submit" name="submit" value="Add Loan" class="btn btn-primary" />
</form>
@endsection
