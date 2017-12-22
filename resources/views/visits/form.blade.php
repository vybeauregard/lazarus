<div class="form-group row">
    <div class="col-md-2">
        <label for="date">Date</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control datepicker" id="date" name="date" data-provide="datepicker" value="{{ old('date') ?? $visit->date->format('m/d/Y') }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    </div>
    <div class="col-md-2">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="client">Client</label>
    </div>
    <div class="col-md-3 input-group">
        <input type="text" class="form-control " id="client" name="client" value="{{ old('client') ?? $visit->client }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    </div>
    <div class="col-md-2">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="counselor">Counselor</label>
    </div>
    <div class="col-md-3 input-group">
        <input type="text" class="form-control " id="counselor" name="counselor" value="{{ old('counselor') ?? $visit->counselor }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    </div>
    <div class="col-md-2">
    </div>
</div>


Counselor (dropdown? autocomplete?)

<div class="form-group row">
    <div class="col-md-2">
        <label for="request">Request</label>
    </div>
    <div class="col-md-5">
        <textarea class="form-control" rows="5" id="request" name="request">{{ old('request') ?? $visit->request }}</textarea>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="action">Action</label>
    </div>
    <div class="col-md-5">
        <textarea class="form-control" rows="5" id="action" name="action">{{ old('action') ?? $visit->action }}</textarea>
    </div>
</div>
