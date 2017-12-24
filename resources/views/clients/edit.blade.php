@extends('layouts.app')

@section('content')
<h3>{{ $client->name }}</h3>
<form style="margin:14px;" class="" method="post" action="{{ route('clients.update', $client->id) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    @include('clients.form')

    @if($client->family->count())
    <hr />

    <div class="row">
        <div class="col-md-10">
            <h4>Family Members</h4>
        </div>

        <div class="col-md-2">
            <a href="{{ route('clients.families.create', $client->id) }}" class="btn btn-success">Add Family Member</a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Relationship</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
    @foreach($client->family as $family)
            <tr data-family-id="{{ $family->id }}">
                <td><a href="{{ route('clients.families.edit', [$client->id, $family->id]) }}">{{ $family->name }}</a></td>
                <td>{{ str_replace("_", " ", title_case($family->relationship)) }}</td>
                <td><button onclick="removeFamilyMember({{ $family->id }})" class="btn btn-link popconfirm glyphicon glyphicon-trash no-underline" data-confirm-title="Remove Family Member" data-confirm-content="Are you sure?" ></button></td>

            </tr>
    @endforeach
        </tbody>
    </table>
    @else
        <a href="{{ route('clients.families.create', $client->id) }}" class="btn btn-success">Add Family Member</a>
    @endif

    <input type="submit" name="submit" value="Save Client" class="btn btn-primary" />
</form>
@endsection

@section('custom-js')
<script>
function removeFamilyMember(family_id) {
    var url = "{{ route('clients.families.destroy', [$client->id, 0]) }}";
    var ajax = {
        data: {
            _token: $("input[name='_token']").val(),
            _method: "DELETE"
        },
        url: url.substr(0, (url.length - 1)) + family_id
    };
    $.post(ajax).then(function(){
        $('tr[data-family-id="'+family_id+'"]').remove();
    });
}
</script>
@endsection

