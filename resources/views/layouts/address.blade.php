<div class="form-group row">
    <div class="col-md-2">
        <label for="address1">Address 1</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="address1" name="address1" value="{{ old('address1') ?? ($model->contact ? $model->contact->address1 : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="address2">Address 2</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="address2" name="address2" value="{{ old('address2') ?? ($model->contact ? $model->contact->address2 : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="city">City</label>
    </div>
    <div class="col-md-5">
        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') ?? ($model->contact? $model->contact->city : '') }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="state">State</label>
    </div>
    <div class="col-md-2">
        <select class="form-control" id="state" name="state">
            <option disabled {{ old('state') || ($model->contact && $model->contact->state) ? '' : 'selected' }}>Select a State</option>
            @foreach($states as $code => $state)
            @if(old('state') && old('state') == $code)
            <option value="{{ $code }}" selected>{{ $state }}</option>
            @elseif($model->contact && $model->contact->state == $code)
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
        <input type="text" class="form-control" id="zip" name="zip" value="{{ old('zip') ?? ($model->contact ? $model->contact->zip : '') }}" />
    </div>
</div>
