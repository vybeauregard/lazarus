@extends('layouts.app')

@section('title')
| Clients
@endsection

@section('content')
<h3>Clients</h3>
<a href="{{ route('clients.create') }}" class="btn btn-success">New Client</a>
{{ csrf_field() }}

<table class="table table-striped" style="width:500px;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr data-client-id="{{ $client->id }}">
            <td><a href="{{ route('clients.show', $client->id) }}">{{ $client->name }}</a></td>
            <td>{{ $client->date->format('m/d/Y') }}</td>
            <td><button class="btn btn-link glyphicon glyphicon-trash no-underline"
                        data-toggle="confirmation"
                        data-title="Remove this Client?"
                        data-on-confirm="removeClient"></button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection

@section('custom-js')
<script>
function removeClient() {
    var client_id = $(this).closest('tr').data('client-id');
    var url = "{{ route('clients.destroy', 0) }}";
    var ajax = {
        data: {
            _token: $("input[name='_token']").val(),
            _method: "DELETE"
        },
        url: url.substr(0, (url.length - 1)) + client_id
    };
    $.post(ajax).then(function (){
        $('tr[data-client-id="'+client_id+'"]').remove();
    });
}
</script>
@endsection
