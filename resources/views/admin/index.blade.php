@extends('layouts.app')

@section('title')
| Users
@endsection

@section('content')
<h3>Users</h3>
{{ csrf_field() }}

<table class="table table-striped admin-user-table" style="width:500px;">
    <thead>
        <tr>
            <th>Name</th>
            <th>email</th>
            <th>Verified</th>
            <th>Admin</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr data-user-id="{{ $user->id }}">
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td class="text-center">
                <label class="form-check-label">
                  @if(old('verified') && old('verified') == 1)
                    <input class="form-check-input" type="checkbox" id="verified" name="verified" checked>
                  @elseif($user->verified == 1)
                    <input class="form-check-input" type="checkbox" id="verified" name="verified" checked>
                  @else
                    <input class="form-check-input" type="checkbox" id="verified" name="verified">
                  @endif
                </label>

            </td>
            <td class="text-center">
                <label class="form-check-label">
                  @if(old('admin') && old('admin') == 1)
                    <input class="form-check-input" type="checkbox" id="admin" name="admin" checked>
                  @elseif($user->admin == 1)
                    <input class="form-check-input" type="checkbox" id="admin" name="admin" checked>
                  @else
                    <input class="form-check-input" type="checkbox" id="admin" name="admin">
                  @endif
                </label>

            </td>
            <td><button onclick="removeUser({{ $user->id }})" class="btn btn-link popconfirm glyphicon glyphicon-trash no-underline" data-confirm-title="Remove User" data-confirm-content="Are you sure?" ></button></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection

@section('custom-js')
<script>

$(".admin-user-table input[type='checkbox']").on('click', function(){
    var field = $(this).attr('name');
    var url = "{{ route('users.update', 0) }}";
    var checked = 0;
    console.log($(this).prop('checked'))
    if ($(this).prop('checked') == true) {
        checked = 1;
    }
    var ajax = {
        data: {
            _token: $("input[name='_token']").val(),
            _method: "patch",
        },
        url: url.substr(0, (url.length - 1)) + $(this).closest('tr').data('user-id')
    };
    ajax.data[field] = checked;
    $.post(ajax).then(function (){
    });
});
function removeUser(user_id) {
    var url = "{{ route('users.destroy', 0) }}";
    var ajax = {
        data: {
            _token: $("input[name='_token']").val(),
            _method: "DELETE"
        },
        url: url.substr(0, (url.length - 1)) + user_id
    };
    $.post(ajax).then(function (){
        $('tr[data-user-id="'+user_id+'"]').remove();
    });
}
</script>
@endsection
