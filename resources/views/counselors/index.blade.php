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
                <th>Phone</th>
                <th>email</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
        @foreach($counselors as $counselor)
            <tr data-counselor-id="{{ $counselor->id }}">
                <td><a href="{{ route('counselors.show', $counselor->id) }}">{{ $counselor->name }}</a></td>
                <td>{{ $counselor->contact->formattedPhone }}</td>
                <td>{!! $counselor->contact->linkedEmail !!}</td>
                <td><button class="btn btn-link glyphicon glyphicon-trash no-underline"
                            data-toggle="confirmation"
                            data-title="Remove this Counselor?"
                            data-on-confirm="removeCounselor"></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
@endsection

@section('custom-js')
<script>
function removeCounselor() {
    var counselor_id = $(this).closest('tr').data('counselor-id');
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
