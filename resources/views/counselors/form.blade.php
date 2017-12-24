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
        <label for="middle_initial">Middle Initial</label>
    </div>
    <div class="col-md-1">
        <input type="text" class="form-control" id="middle_initial" name="middle_initial" maxlength="1" value="{{ old('middle_initial') ?? ($counselor->contact ? $counselor->contact->middle_initial : '') }}" />
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

<div class="form-group row">
    <div class="col-md-2">
        <label for="parish">Primary Parish</label>
    </div>
    <div class="col-md-3 input-group">
        <input type="text"
               class="form-control typeahead"
               data-provide="typeahead"
               autocomplete="off"
               id="parish"
               name="parish"
               value="{{ old('parish') ?? ($counselor->parish ? $counselor->parish->name : '') }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
        <input type="hidden" name="parish_id" value="{{ old('parish_id') ?? $counselor->parish_id }}" />
    </div>
    <div class="col-md-2">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="address1">Address 1</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="address1" name="address1" value="{{ old('address1') ?? ($counselor->contact ? $counselor->contact->address1 : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="address2">Address 2</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="address2" name="address2" value="{{ old('address2') ?? ($counselor->contact ? $counselor->contact->address2 : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="city">City</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') ?? ($counselor->contact? $counselor->contact->city : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="state">State</label>
    </div>
    <div class="col-md-2">
        <select class="form-control" id="state" name="state">
            <option disabled {{ old('state') || ($counselor->contact && $counselor->contact->state) ? '' : 'selected' }}>Select a State</option>
            @foreach($states as $code => $state)
            @if(old('state') && old('state') == $code)
            <option value="{{ $code }}" selected>{{ $state }}</option>
            @elseif($counselor->contact && $counselor->contact->state == $code)
            <option value="{{ $code }}" selected>{{ $state }}</option>
            @else
            <option value="{{ $code }}">{{ $state }}</option>
            @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="zip">Zip</label>
    </div>
    <div class="col-md-2">
        <input type="text" class="form-control" id="zip" name="zip" value="{{ old('zip') ?? ($counselor->contact ? $counselor->contact->zip : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="email">email</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') ?? ($counselor->contact? $counselor->contact->email : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="phone">Phone Number</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control bfh-phone" id="phone" name="phone" data-format="(ddd) ddd-dddd" value="{{ old('phone') ?? ($counselor->contact ? $counselor->contact->phone : '') }}">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="emergency_phone">Emergency Contact Number</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control bfh-phone" id="emergency_phone" name="emergency_phone" data-format="(ddd) ddd-dddd" value="{{ old('emergency_phone') ?? ($counselor->contact ? $counselor->contact->emergency_phone : '') }}">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
    </div>
</div>

@section('custom-js')
<script>
    $(".typeahead[name='parish']").typeahead({
        provide: "typeahead",
        source: {!! $parishes !!},
        showHintOnFocus: "true",
        afterSelect: function(item) {
            $("input[name='parish_id']").val(item.id)
        }
    }).on('blur', function(){
        if($(this).val() == "") {
            $("input[name='parish_id']").val('');
        }
    });
</script>
@endsection
