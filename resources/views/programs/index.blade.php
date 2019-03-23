@extends('layouts.app')

@section('title')
| Programs
@endsection

@section('content')
<div class="container">
    <h3>Programs</h3>
    <a href="{{ route('programs.create') }}" class="btn btn-success">New Program</a>
    {{ csrf_field() }}

    <table class="table table-striped" style="width:500px;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Client</th>
                <th>Submitted</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
        @foreach($programs as $program)
            <tr data-program-id="{{ $program->id }}">
                <td><a href="{{ route('programs.show', $program->id) }}">{{ $program->name }}</a></td>
                <td> {{ $program->client ? $program->client->name : '' }} </td>
                <td> {{ $program->application_submitted ? $program->application_submitted->format('m/d/Y') : 'not submitted' }} </td>
                <td><button class="btn btn-link glyphicon glyphicon-trash no-underline"
                            data-toggle="confirmation"
                            data-title="Remove this Program?"
                            data-on-confirm="removeProgram"></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('custom-js')
<script>
function removeProgram() {
    var program_id = $(this).closest('tr').data('program-id');
    var url = "{{ route('programs.destroy', 0) }}";
    var ajax = {
        data: {
            _token: $("input[name='_token']").val(),
            _method: "DELETE"
        },
        url: url.substr(0, (url.length - 1)) + program_id
    };
    $.post(ajax).then(function (){
        $('tr[data-program-id="'+program_id+'"]').remove();
    });
}
</script>
@endsection
