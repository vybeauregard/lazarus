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
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?? ($parish->contact? $parish->contact->email : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="phone">Phone Number</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="tel" class="form-control bfh-phone" id="phone" name="phone" data-format="(ddd) ddd-dddd" value="{{ old('phone') ?? ($parish->contact ? $parish->contact->phone : '') }}">
        <div class="input-group-append"><span class="input-group-text"><i class="oi oi-phone" title="phone" aria-hidden="true"></i></span></div>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="emergency_phone">Emergency Contact Number</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="tel" class="form-control bfh-phone" id="emergency_phone" name="emergency_phone" data-format="(ddd) ddd-dddd" value="{{ old('emergency_phone') ?? ($parish->contact ? $parish->contact->emergency_phone : '') }}">
        <div class="input-group-append"><span class="input-group-text"><i class="oi oi-phone" title="phone" aria-hidden="true"></i></span></div>
    </div>
</div>
