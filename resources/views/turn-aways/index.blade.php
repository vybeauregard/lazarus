@extends('layouts.app')

@section('title')
| Reports
@endsection

@section('content')
<div class="container">
    <h3>Turn Aways</h3>
    <a href="{{ route('turn-aways.create') }}" class="btn btn-success">Log Turn-aways</a>
    {{ csrf_field() }}

    <table class="table table-striped" style="width:500px;">
        <thead>
            <tr>
                <th>Date</th>
                <th>Total</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
        @foreach($turn_aways as $date)
            <tr data-date="{{ $date->date->format('Y-m-d') }}">
                <td>{{ $date->date->format('m/d/Y') }}</td>
                <td>{{ $date->total }}</td>

                <td><button class="btn btn-link glyphicon glyphicon-trash no-underline"
                            data-toggle="confirmation"
                            data-title="Remove this Date?"
                            data-on-confirm="removeDate"></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('custom-js')
<script>
function removeDate() {
    var date = $(this).closest('tr').data('date');
    var url = "{{ route('turn-aways.destroy', 0) }}";
    var ajax = {
        data: {
            _token: $("input[name='_token']").val(),
            _method: "DELETE"
        },
        url: url.substr(0, (url.length - 1)) + date
    };
        console.log(ajax);

    $.post(ajax).then(function (){
        $('tr[data-date="'+date+'"]').remove();
    });
}
</script>
@endsection

