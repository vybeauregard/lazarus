<div class="form-group row">
    <div class="col-md-2">
        <label for="date">Date</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control datepicker" id="date" name="date" data-provide="datepicker" value="{{ old('date') ?? $turn_away->date->format('m/d/Y') }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    </div>
    <div class="col-md-2">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        <label for="middle_initial">Total</label>
    </div>
    <div class="col-md-1">
        <input type="text" class="form-control" id="total" name="total" maxlength="1" value="{{ old('total') ?? ($turn_away->total ? $turn_away->total : '') }}" />
    </div>
</div>
