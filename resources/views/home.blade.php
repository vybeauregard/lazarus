@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
            <div class="panel">
                <a class="btn btn-link" href="{{ route('visitors') }}">Visitors</a>
                <a class="btn btn-link" href="{{ route('clients') }}">Clients</a>
                <a class="btn btn-link" href="{{ route('programs') }}">Programs</a>
                <a class="btn btn-link" href="{{ route('loans') }}">Loans</a>
                <a class="btn btn-link" href="{{ route('parishes') }}">Parishes</a>
                <a class="btn btn-link" href="{{ route('reports') }}">Reports</a>
            </div>
        </div>
    </div>
</div>
@endsection
