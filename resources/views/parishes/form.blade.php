<div class="form-group row">
    <div class="col-md-2">
        <label for="name">Name</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $parish->name }}" />
    </div>
</div>

@include('layouts.address', ['model' => $parish])

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
