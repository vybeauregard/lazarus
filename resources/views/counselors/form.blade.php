<div class="form-group row">
    <div class="col-md-2">
        <label for="first_name">First Name</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') ?? ($counselor->contact ? $counselor->contact->first_name : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="middle_name">Middle Name</label>
    </div>
    <div class="col-md-2">
        <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name') ?? ($counselor->contact ? $counselor->contact->middle_name : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="last_name">Last Name</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') ?? ($counselor->contact ? $counselor->contact->last_name : '') }}" />
    </div>
</div>

{{--
<div class="form-group row">
    <div class="col-md-2">
        <label for="parish">Primary Parish</label>
    </div>
    <div class="col-md-3 input-group">
        @if($parishes->count() > 1)
        <input type="text"
               class="form-control typeahead"
               data-provide="typeahead"
               autocomplete="off"
               id="parish"
               name="parish"
               placeholder="Type a name or click to select"
               value="{{ old('parish') ?? ($counselor->parish ? $counselor->parish->name : '') }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
        <input type="hidden" name="parish_id" value="{{ old('parish_id') ?? $counselor->parish_id }}" />
        @else
        <input class="form-control" disabled value="{{ $parishes->first()['name'] }}" >
        <input type="hidden" name="parish_id" value="{{ $parishes->first()['id'] }}" />
        @endif
    </div>
    <div class="col-md-2">
    </div>
</div>
--}}

@include('layouts.address', ['model' => $counselor])

<div class="form-group row">
    <div class="col-md-2">
        <label for="email">email</label>
    </div>
    <div class="col-md-5">
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?? ($counselor->contact? $counselor->contact->email : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="phone">Phone Number</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="tel" class="form-control bfh-phone" id="phone" name="phone" data-format="(ddd) ddd-dddd" value="{{ old('phone') ?? ($counselor->contact ? $counselor->contact->phone : '') }}">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="emergency_phone">Emergency Contact Number</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="tel" class="form-control bfh-phone" id="emergency_phone" name="emergency_phone" data-format="(ddd) ddd-dddd" value="{{ old('emergency_phone') ?? ($counselor->contact ? $counselor->contact->emergency_phone : '') }}">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
    </div>
</div>

@section('custom-js')
<script>
    $(".typeahead[name='parish']").typeahead({
        provide: "typeahead",
        source: {!! $parishes !!},
        showHintOnFocus: "all",
        autoSelect: false,
        minLength: 2,
        afterSelect: function(item) {
            $("input[name='parish_id']").val(item.id)
        }
    }).on('keyup', function(event){
        if ((event.keyCode === 8 || event.keyCode === 46) && $(this).val() === '') {
            $(this).blur();
            $(this).focus();
        }
    }).on('blur', function(){
        if($(this).val() == "") {
            $("input[name='parish_id']").val('');
        }
    });
</script>
@endsection
