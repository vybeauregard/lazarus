@extends('layouts.app')

@section('title')
| Request Types
@endsection

@section('content')
<div class="container">
    <h3>Request Types</h3>
    <div class="row">
        <div class="col-md-2">
        <a href="{{ route('request-types.create') }}" class="btn btn-success">New Request Type</a>
        {{ csrf_field() }}
        </div>
    </div>


    <table class="table table-striped" style="width:500px;">
        <thead>
            <tr>
                <th>Type</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
        @foreach($requestTypes as $requestType)
            <tr data-request-type-id="{{ $requestType->id }}">
                <td>{{ $requestType->type }}</a></td>
                <td><button class="btn btn-link glyphicon glyphicon-trash no-underline"
                            data-toggle="confirmation"
                            data-title="Remove this Request Type?"
                            data-on-confirm="removeRequestType"></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection

@section('custom-js')
<script>
    function removeRequestType() {
        var request_type_id = $(this).closest('tr').data('request-type-id');
        var url = "{{ route('request-types.destroy', 0) }}";
        var ajax = {
            data: {
                _token: $("input[name='_token']").val(),
                _method: "DELETE"
            },
            url: url.substr(0, (url.length - 1)) + request_type_id
        };
        $.post(ajax).then(function (){
            $('tr[data-request-type-id="'+request_type_id+'"]').remove();
        });
    }
</script>
@endsection
