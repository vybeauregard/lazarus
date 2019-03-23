@extends('layouts.app')

@section('title')
| Loans | Add Loan
@endsection

@section('content')
<h2>Add a Loan</h2>

<form style="margin:14px;" class="" method="post" action="{{ route('loans.store') }}" autocomplete="off">
    {{ csrf_field() }}
    @include('loans.form')
    <input type="submit" name="submit" value="Add Loan" class="btn btn-primary" />
</form>
@endsection
