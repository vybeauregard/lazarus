<input type="hidden" name="visit_id" value="{{ $visit->id }}" />

<div class="form-group row">
    <div class="col-md-2">
        <label for="type">Request Type</label>
    </div>
    <div class="col-md-5">
        <select class="form-control" name="type" id="type">
            @foreach($request->types as $index=>$type)
                @if(old('type') == $index)
                <option value="{{ $index }}" selected>{{ $type }}</option>
                @else
                <option value="{{ $index }}" {{ $index == $request->type ? 'selected' : '' }}>{{ $type }}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="amount">Amount</label>
    </div>
    <div class="input-group col-md-5">
        <div class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></div>
        <input class="form-control" rows="5" id="amount" name="amount" value="{{ old('amount') ?? $request->amount }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="original_amount">Original Amount</label>
    </div>
    <div class="input-group col-md-5">
        <div class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></div>
        <input class="form-control" rows="5" id="original_amount" name="original_amount" value="{{ old('original_amount') ?? $request->original_amount }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="action">Action</label>
    </div>
    <div class="col-md-5">
        @foreach($actions as $value => $action)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="{{ $action }}" name="actions[]" value="{{$value}}">
            <label class="form-check-label" for="{{ $action }}">
            {{ $action }}
            </label>
        </div>
        @endforeach
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="notes">Notes</label>
    </div>
    <div class="col-md-5">
        <textarea class="form-control" rows="5" id="notes" name="notes">{{ old('notes') ?? $request->notes }}</textarea>
    </div>
</div>
