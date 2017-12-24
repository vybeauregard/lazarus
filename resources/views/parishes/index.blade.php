@extends('layouts.app')

@section('content')
<h3>Parishes</h3>
<a href="{{ route('parishes.create') }}" class="btn btn-success">New Parish</a>
{{ csrf_field() }}

<table class="table table-striped" style="width:500px;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
    @foreach($parishes as $parish)
        <tr data-parish-id="{{ $parish->id }}">
            <td><a href="{{ route('parishes.show', $parish->id) }}">{{ $parish->name }}</a></td>
            <td>{!! implode("<br>", $parish->formattedAddress) !!}</td>
            <td>{{ $parish->formattedPhone }}</td>
            <td><button onclick="removeParish({{ $parish->id }})" class="btn btn-link popconfirm glyphicon glyphicon-trash no-underline" data-confirm-title="Remove Parish" data-confirm-content="Are you sure?" ></button></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection

@section('custom-js')
<script>
function removeParish(parish_id) {
    var url = "{{ route('parishes.destroy', 0) }}";
    var ajax = {
        data: {
            _token: $("input[name='_token']").val(),
            _method: "DELETE"
        },
        url: url.substr(0, (url.length - 1)) + parish_id
    };
    $.post(ajax).then(function (){
        $('tr[data-parish-id="'+parish_id+'"]').remove();
    });
}
</script>
@endsection

