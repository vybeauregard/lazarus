<div class="form-group row">
    <div class="col-md-2">
        <label for="name">Name</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $parish->name }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="address1">Address 1</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="address1" name="address1" value="{{ old('address1') ?? ($parish->contact ? $parish->contact->address1 : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="address2">Address 2</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="address2" name="address2" value="{{ old('address2') ?? ($parish->contact ? $parish->contact->address2 : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="city">City</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') ?? ($parish->contact? $parish->contact->city : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="state">State</label>
    </div>
    <div class="col-md-2">
        <select class="form-control" id="state" name="state">
            <option disabled {{ old('state') || ($parish->contact && $parish->contact->state) ? '' : 'selected' }}>Select a State</option>
            @foreach($states as $code => $state)
            @if(old('state') && old('state') == $code)
            <option value="{{ $code }}" selected>{{ $state }}</option>
            @elseif($parish->contact && $parish->contact->state == $code)
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
        <input type="text" class="form-control" id="zip" name="zip" value="{{ old('zip') ?? ($parish->contact ? $parish->contact->zip : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="email">email</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') ?? ($parish->contact? $parish->contact->email : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="phone">Phone Number</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control bfh-phone" id="phone" name="phone" data-format="(ddd) ddd-dddd" value="{{ old('phone') ?? ($parish->contact ? $parish->contact->phone : '') }}">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="emergency_phone">Emergency Contact Number</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control bfh-phone" id="emergency_phone" name="emergency_phone" data-format="(ddd) ddd-dddd" value="{{ old('emergency_phone') ?? ($parish->contact ? $parish->contact->emergency_phone : '') }}">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
    </div>
</div>
