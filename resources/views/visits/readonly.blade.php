<div style="margin:14px;">
    <div class="form-group row">
        <div class="col-md-2">
            <label for="date">Date</label>
        </div>
        <div class="col-md-2">
            <p type="text" class="" id="date" name="date">{{ old('date') ?? $visit->date->format('m/d/Y') }}</p>
        </div>
        <div class="col-md-2">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="client">Client</label>
        </div>
        <div class="col-md-3">
            <p id="client" name="client">{{ $visit->client->name }}</p>
        </div>
        <div class="col-md-2">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="counselor">Counselor</label>
        </div>
        <div class="col-md-3">
            <p id="counselor" name="counselor">{{ $visit->counselor->name }}</p>
        </div>
        <div class="col-md-2">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="request">Request</label>
        </div>
        <div class="col-md-5">
            <p class="" rows="5" id="request" name="request">{{ old('request') ?? $visit->request }}</p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="action">Action</label>
        </div>
        <div class="col-md-5">
            <p class="" rows="5" id="action" name="action">{{ old('action') ?? $visit->action }}</p>
        </div>
    </div>
</div>
