@extends('layouts.app')

@section('title')
| Clients
@endsection

@section('content')
<div class="container">
    <h3>Clients</h3>
    <div class="row">
        <div class="col-md-2">
        <a href="{{ route('clients.create') }}" class="btn btn-success">New Client</a>
        {{ csrf_field() }}
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text"
                       class="form-control typeahead"
                       data-provide="typeahead"
                       autocomplete="off"
                       id="client"
                       name="client"
                       placeholder="Search for a client" />
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            </div>
        </div>
    </div>


    <table class="table table-striped" style="width:500px;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Visits</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr data-client-id="{{ $client->id }}">
                <td><a href="{{ route('clients.show', $client->id) }}">{{ $client->name }}</a></td>
                <td>{{ $client->date->format('m/d/Y') }}</td>
                <td>{{ $client->visit->count() }}</td>
                <td><button class="btn btn-link glyphicon glyphicon-trash no-underline"
                            data-toggle="confirmation"
                            data-title="Remove this Client?"
                            data-on-confirm="removeClient"></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $clients->links() }}

</div>
@endsection

@section('custom-js')
<script>
    $(".typeahead[name='client']").typeahead({
        provide: "typeahead",
        source: @json($clientsTypeahead),
        showHintOnFocus: false,
        autoSelect: false,
        items: 'all',
        minLength: 2,
        afterSelect: function(item) {
            var url = "{{ route('clients.show', 0) }}".replace('/0', '/' + item.id);
            window.location.href = url;
        }
    }).on('keyup', function(event){
        if ((event.keyCode === 8 || event.keyCode === 46) && $(this).val() === '') {
            $(this).blur();
            $(this).focus();
        }
        if (event.keyCode === 27) {
            $(this).val(null);
        }
    });
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
