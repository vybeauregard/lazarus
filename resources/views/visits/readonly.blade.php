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
            <p id="client" name="client"><a href="{{ route('clients.show', $visit->client_id) }}">{{ $visit->client->name }}</a></p>
        </div>
        <div class="col-md-2">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">
            <label for="counselor">Counselor</label>
        </div>
        <div class="col-md-3">
            <p id="counselor" name="counselor">{{ $visit->counselor->fullName }}</p>
        </div>
        <div class="col-md-2">
        </div>
    </div>

@if($visit->requests->count())
    <hr />
    <div class="row">
        <div class="col-md-10">
            <h4>Requests</h4>
        </div>

        <div class="col-md-2">
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Type</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    @foreach($visit->requests as $request)
            <tr data-request-id="{{ $request->id }}">
                <td><a href="{{ route('visits.requests.show', [$visit->id, $request->id]) }}">{{ $request->formattedType }}</a></td>
                <td>${{ ($request->amount) }}</td>
                <td>{{ $request->formattedActions }}</td>

            </tr>
    @endforeach
        </tbody>
    </table>
@else
    <em>No request data provided</em>
@endif
</div>
