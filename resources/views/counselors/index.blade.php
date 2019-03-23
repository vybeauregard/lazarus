@extends('layouts.app')

@section('title')
| Counselors
@endsection

@section('content')
<div class="container">
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
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
        @foreach($counselors as $counselor)
            <tr data-counselor-id="{{ $counselor->id }}">
                <td><a href="{{ route('counselors.show', $counselor->id) }}">{{ $counselor->name }}</a></td>
                <td>{{ $counselor->contact->formattedPhone }}</td>
                <td>{!! $counselor->contact->linkedEmail !!}</td>
                <td>
                    <input name="active" type="checkbox" {{ $counselor->active ? 'checked' : '' }} onchange="deactivateCounselor(this)" />
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection

@section('custom-js')
<script>
function deactivateCounselor(element) {
    var counselor_id = $(element).closest('tr').data('counselor-id');
    var url = "{{ route('counselors.toggle-active', 0) }}";
    console.log(counselor_id);
    var ajax = {
        data: {
            _token: $("input[name='_token']").val(),
            _method: "PATCH"
        },
        url: url.substr(0, (url.length - 1)) + counselor_id
    };
    $.post(ajax).then(function (){
        //$('tr[data-counselor-id="'+counselor_id+'"]').remove();
    });
}
</script>
@endsection
