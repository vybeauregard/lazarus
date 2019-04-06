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
    <div class="col-md-3">
        <div class="input-group">
            <input type="text"
                   class="form-control typeahead"
                   data-provide="typeahead"
                   autocomplete="off"
                   id="client"
                   name="client"
                   placeholder="Type a name"
                   value="{{ old('client') ?? ($visit->client ? $visit->client->name : '') }}" />
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="hidden" name="client_id" value="{{ old('client_id') ?? $visit->client_id }}" />
        </div>
    </div>
    <div class="col-md-2">
        <a href="{{ route('clients.create') }}" class="btn btn-link">Add new Client</a>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="counselor">Counselor</label>
    </div>
    <div class="col-md-3">
        <div class="input-group">
            <input type="text"
                   class="form-control typeahead"
                   data-provide="typeahead"
                   autocomplete="off"
                   id="counselor"
                   name="counselor"
                   placeholder="Type a name or click to select"
                   value="{{ old('counselor') ?? ($visit->counselor ? $visit->counselor->name : '') }}" />
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="hidden" name="counselor_id" value="{{ old('counselor_id') ?? $visit->counselor_id }}" />
        </div>
    </div>
    <div class="col-md-2">
        <a href="{{ route('counselors.create') }}" class="btn btn-link">Add new Counselor</a>
    </div>
</div>

@if($visit->requests->count())
<hr />
<div class="row request-display">
    <div class="col-md-9">
        <h4>Requests</h4>
    </div>
</div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Type</th>
                <th>Amount</th>
                <th>Action</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
    @foreach($visit->requests as $request)
            <tr data-request-id="{{ $request->id }}">
                <td><a href="{{ route('visits.requests.edit', [$visit->id, $request->id]) }}">{{ $request->formattedType }}</a></td>
                <td>{{ $request->amount }}</td>
                <td>{{ $request->formattedActions }}</td>
                <td><a class="btn btn-link glyphicon glyphicon-trash no-underline"
                            data-toggle="confirmation"
                            data-title="Remove this Request?"
                            data-on-confirm="removeRequest"></a>
                </td>

            </tr>
    @endforeach
        </tbody>
    </table>
@endif

@section('custom-js')
<script>
    $(".typeahead[name='client']").typeahead({
        provide: "typeahead",
        source: {!! $clients !!},
        showHintOnFocus: false,
        autoSelect: false,
        minLength: 2,
        afterSelect: function(item) {
            $("input[name='client_id']").val(item.id)
        }
    }).on('keyup', function(event){
        if ((event.keyCode === 8 || event.keyCode === 46) && $(this).val() === '') {
            $(this).blur();
            $(this).focus();
        }
        if (event.keyCode === 27) {
            $(this).val(null);
        }
    }).on('blur', function(){
        if($(this).val() == "") {
            $("input[name='client_id']").val('');
        }
    });
    $(".typeahead[name='counselor']").typeahead({
        provide: "typeahead",
        source: {!! $counselors !!},
        showHintOnFocus: false,
        autoSelect: false,
        minLength: 2,
        items: "all",
        afterSelect: function(item) {
            $("input[name='counselor_id']").val(item.id)
        }
    }).on('keyup', function(event){
        if ((event.keyCode === 8 || event.keyCode === 46) && $(this).val() === '') {
            $(this).blur();
            $(this).focus();
        }
        if (event.keyCode === 27) {
            $(this).val(null);
        }
    }).on('blur', function(){
        if($(this).val() == "") {
            $("input[name='counselor_id']").val('');
        }
    });

function removeRequest() {
    var request_id = $(this).closest('tr').attr('data-request-id');
    var url = "{{ route('visits.requests.destroy', [$visit->id, 0]) }}";
    var ajax = {
        data: {
            _token: $("input[name='_token']").val(),
            _method: "DELETE"
        },
        url: url.substr(0, (url.length - 1)) + request_id
    };
    $.post(ajax).then(function(){
        $row = $('tr[data-request-id="'+request_id+'"]');
        $table = $row.closest(".table");
        if ($row.length) {
            if ($row.siblings().length == 0) {
                $table.remove();
            } else {
                $row.remove();
            }
        } else {
            $(".request-display").remove();
        }
    });
}

</script>
@endsection
