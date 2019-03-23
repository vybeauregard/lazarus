@extends('layouts.app')

@section('title')
| Visits
@endsection

@section('content')
<div class="container">
    <h3>Visits</h3>
    <a href="{{ route('visits.create') }}" class="btn btn-success">New Visit</a>
    {{ csrf_field() }}

    <table class="table table-striped" style="width:500px;">
        <thead>
            <tr>
                <th>Client</th>
                <th>Date</th>
                <th>Counselor</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
        @foreach($visits as $visit)
            <tr data-visit-id="{{ $visit->id }}">
                <td><a href="{{ route('visits.show', $visit->id) }}">{{ $visit->client->name }}</a></td>
                <td>{{ $visit->date->format('m/d/Y') }}</td>
                <td>{{ $visit->counselor->name }}</td>
                <td><button class="btn btn-link glyphicon glyphicon-trash no-underline"
                            data-toggle="confirmation"
                            data-title="Remove this Visit?"
                            data-on-confirm="removeVisit"></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('custom-js')
<script>
function removeVisit(visit_id) {
    var visit_id = $(this).closest('tr').data('visit-id');
    var url = "{{ route('visits.destroy', 0) }}";
    var ajax = {
        data: {
            _token: $("input[name='_token']").val(),
            _method: "DELETE"
        },
        url: url.substr(0, (url.length - 1)) + visit_id
    };
    $.post(ajax).then(function (){
        $('tr[data-visit-id="'+visit_id+'"]').remove();
    });
}
</script>
@endsection

