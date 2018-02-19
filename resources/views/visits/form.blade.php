<div class="form-group row">
    <div class="col-md-2">
        <label for="date">Date</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control datepicker" id="date" name="date" data-provide="datepicker" value="{{ old('date') ?? $visit->date->format('m/d/Y') }}" />
        <div class="input-group-append"><span class="input-group-text"><i class="oi oi-calendar" title="calendar" aria-hidden="true"></i></span></div>
    </div>
    <div class="col-md-2">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="client">Client</label>
    </div>
    <div class="col-md-3 input-group">
        <input type="text"
               class="form-control typeahead"
               data-provide="typeahead"
               autocomplete="off"
               id="client"
               name="client"
               placeholder="Type a name"
               value="{{ old('client') ?? ($visit->client ? $visit->client->name : '') }}" />
        <div class="input-group-append"><span class="input-group-text"><i class="oi oi-person" title="client" aria-hidden="true"></i></span></div>
        <input type="hidden" name="client_id" value="{{ old('client_id') ?? $visit->client_id }}" />
    </div>
    <div class="col-md-2">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="counselor">Counselor</label>
    </div>
    <div class="col-md-3 input-group">
        <input type="text"
               class="form-control typeahead"
               data-provide="typeahead"
               autocomplete="off"
               id="counselor"
               name="counselor"
               placeholder="Type a name or click to select"
               value="{{ old('counselor') ?? ($visit->counselor ? $visit->counselor->name : '') }}" />
        <div class="input-group-append"><span class="input-group-text"><i class="oi oi-person" title="counselor" aria-hidden="true"></i></span></div>
        <input type="hidden" name="counselor_id" value="{{ old('counselor_id') ?? $visit->counselor_id }}" />
    </div>
    <div class="col-md-2">
    </div>
</div>

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
</script>
@endsection
