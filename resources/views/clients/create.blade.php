@extends('layouts.app')

@section('title')
| Clients | Add Client
@endsection

@section('content')
<h2>Add a new Client</h2>
<form style="margin:14px;" class="" method="post" action="{{ route('clients.store') }}">
    {{ csrf_field() }}
    @include('clients.form')
<hr />
    <h3>Family Members</h3>
    @if(count(preg_grep("/family_name_/", array_keys(old()))))
        @for($i = 0; $i < count(preg_grep('/family_name_/', array_keys(old()))); $i++)
            @include('clients.family', ['fam_id' => $i])
        @endfor
    @else
        @include('clients.family', ['fam_id' => 0])
    @endif
    <button class="btn btn-success add-family">Add a family member</button>
<hr />

    <input type="submit" name="submit" value="Add Client" class="btn btn-primary" />
</form>
@endsection

@section('custom-css')
@endsection

@section('custom-js')
    <script>
        $("document").ready(function(){
            if ("{{ old('phone') }}" == "") {
                $("#phone").val('');
            }
            if ("{{ old('emergency_phone') }}" == "") {
                $("#emergency_phone").val('');
            }
            $(".datepicker").datepicker({todayHighlight: true})
        });
        $(".input-group-addon").on('click', function(){
            $(this).prev('input').focus();
        });
        $(".add-family").on('click', function(e){
            var lastId = $(".family-form").last().data('id');
            var newId = lastId + 1;
            e.preventDefault();
            $.get( "/load-family-form/" + newId, function() {
            })
            .done(function(data) {
                $(".family-form").last().after(data);
            })
            .fail(function() {
                console.error("Unable to load family form");
            });
        })
    </script>
@endsection
