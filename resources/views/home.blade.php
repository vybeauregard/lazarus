@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('clients.create') }}" class="btn btn-success">Add new Client</a>
                    <a href="{{ route('visits.create') }}" class="btn btn-primary">Add new Visit for an existing client</a>
                    <a href="{{ route('reports.index') }}" class="btn btn-info">View Reports</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
