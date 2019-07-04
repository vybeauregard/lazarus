@extends('layouts.app')

@section('title')
| Actions
@endsection

@section('content')
<div class="container">
    <h3>Actions</h3>
    <div class="row">
        <div class="col-md-2">
        <a href="{{ route('actions.create') }}" class="btn btn-success">New Action</a>
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
        @foreach($actions as $action)
            <tr data-action-id="{{ $action->id }}">
                <td>{{ $action->type }}</a></td>
                <td><button class="btn btn-link glyphicon glyphicon-trash no-underline"
                            data-toggle="confirmation"
                            data-title="Remove this Action?"
                            data-on-confirm="removeAction"></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection

@section('custom-js')
<script>
    function removeAction() {
        var action_id = $(this).closest('tr').data('action-id');
        var url = "{{ route('actions.destroy', 0) }}";
        var ajax = {
            data: {
                _token: $("input[name='_token']").val(),
                _method: "DELETE"
            },
            url: url.substr(0, (url.length - 1)) + action_id
        };
        $.post(ajax).then(function (){
            $('tr[data-action-id="'+action_id+'"]').remove();
        });
    }
</script>
@endsection
