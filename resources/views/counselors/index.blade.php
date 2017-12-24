@extends('layouts.app')

@section('title')
| Counselors
@endsection

@section('content')
<h3>Counselors</h3>

<a href="{{ route('counselors.create') }}" class="btn btn-success">New Counselor</a>
{{ csrf_field() }}

<div>
    @if($counselors->count())
    <table class="table table-striped" style="width:500px;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Primary Parish</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
        @foreach($counselors as $counselor)
            <tr data-counselor-id="{{ $counselor->id }}">
                <td><a href="{{ route('counselors.show', $counselor->id) }}">{{ $counselor->name }}</a></td>
                <td>{{ $counselor->parish ? $counselor->parish->name : '' }}</td>
                <td><button onclick="removeCounselor({{ $counselor->id }})" class="btn btn-link popconfirm glyphicon glyphicon-trash no-underline" data-confirm-title="Remove Counselor" data-confirm-content="Are you sure?" ></button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
@endsection

@section('custom-js')
<script>
function removeCounselor(counselor_id) {
    var url = "{{ route('counselors.destroy', 0) }}";
    var ajax = {
        data: {
            _token: $("input[name='_token']").val(),
            _method: "DELETE"
        },
        url: url.substr(0, (url.length - 1)) + counselor_id
    };
    $.post(ajax).then(function (){
        $('tr[data-counselor-id="'+counselor_id+'"]').remove();
    });
}
</script>
@endsection
