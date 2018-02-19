@extends('layouts.app')

@section('title')
| Admin
@endsection

@section('content')
{{ csrf_field() }}

<div class="row">
    <div class="col">
        <h3>Users</h3>
        <table class="table table-hover admin-user-table" style="width:500px;">
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
                            <input class="" type="checkbox" id="verified" name="verified" checked>
                          @elseif($user->verified == 1)
                            <input class="" type="checkbox" id="verified" name="verified" checked>
                          @else
                            <input class="" type="checkbox" id="verified" name="verified">
                          @endif
                        </label>

                    </td>
                    <td class="text-center">
                        <label class="form-check-label">
                          @if(old('admin') && old('admin') == 1)
                            <input class="" type="checkbox" id="admin" name="admin" checked>
                          @elseif($user->admin == 1)
                            <input class="" type="checkbox" id="admin" name="admin" checked>
                          @else
                            <input class="" type="checkbox" id="admin" name="admin">
                          @endif
                        </label>

                    </td>
                    <td><button class="btn btn-link oi oi-trash no-underline"
                                data-toggle="confirmation"
                                data-title="Remove this User?"
                                data-on-confirm="removeUser"></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <div class="col">
        <h3>Menus</h3>
        <table class="table table-hover admin-menu-table float-left" style="width:500px;">
            <thead>
                <th>Page</th>
                <th>Visible</th>
            </thead>
            <tbody>
            @foreach(config('menus') as $menu => $value)
                <tr>
                    <td>{{ ucwords($menu) }}</td>
                    <td>
                        <label class="form-check-label">
                          @if($value == 1)
                            <input class="menu-config" type="checkbox" id="{{ $menu }}" name="{{ $menu }}" checked>
                          @else
                            <input class="menu-config" type="checkbox" id="{{ $menu }}" name="{{ $menu }}">
                          @endif
                        </label>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
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
function removeUser() {
    var user_id = $(this).closest('tr').data('user-id');
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

    $(".menu-config").on('click', function(){
        var ajax = {
            data: {
                _token: $("input[name='_token']").val(),
                _method: "PATCH",
                menu: $(this).attr('name'),
                visible: $(this).prop('checked')
            },
            url: "{{ route('menus.update') }}"
        };
        $.post(ajax).always(function(){
            window.setTimeout(function(){
                location.reload();
            }, 3000);
        });
    });
</script>
@endsection
