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
               placeholder="Type a name or click to select"
               value="{{ old('client') ?? ($program->client ? $program->client->name : '') }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="hidden" name="client_id" value="{{ old('client_id') ?? $program->client_id }}" />
    </div>
    <div class="col-md-2">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="name">Name</label>
    </div>
    <div class="col-md-4">
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $program->name }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="given_info">Client Given Info On</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control datepicker" id="given_info" name="given_info" data-provide="datepicker" value="{{ old('given_info') ?? ($program->given_info ? $program->given_info->format('m/d/Y') : '') }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    </div>
    <div class="col-md-2">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="application_submitted">Application Submission Date</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control datepicker" id="application_submitted" name="application_submitted" data-provide="datepicker" value="{{ old('application_submitted') ?? ($program->application_submitted ? $program->application_submitted->format('m/d/Y') : '') }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    </div>
    <div class="col-md-2">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="application_approved">Application Approval Date</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control datepicker" id="application_approved" name="application_approved" data-provide="datepicker" value="{{ old('application_approved') ?? ($program->application_approved ? $program->application_approved->format('m/d/Y') : '') }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    </div>
    <div class="col-md-2">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="program_start">Program Start Date</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control datepicker" id="program_start" name="program_start" data-provide="datepicker" value="{{ old('program_start') ?? ($program->program_start ? $program->program_start->format('m/d/Y') : '') }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    </div>
    <div class="col-md-2">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2 form-check form-check-inline">
      <label class="form-check-label">
      @if(old('completed') && old('completed') == 1)
        <input class="form-check-input" type="checkbox" id="completed" name="completed" value="1" checked>
      @elseif($program->completed == 1)
        <input class="form-check-input" type="checkbox" id="completed" name="completed" value="1" checked>
      @else
        <input class="form-check-input" type="checkbox" id="completed" name="completed" value="1">
      @endif
          Program Completed
      </label>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2 form-check form-check-inline">
      <label class="form-check-label">
      @if(old('denied') && old('denied') == 1)
        <input class="form-check-input" type="checkbox" id="denied" name="denied" value="1" checked>
      @elseif($program->completed == 1)
        <input class="form-check-input" type="checkbox" id="denied" name="denied" value="1" checked>
      @else
        <input class="form-check-input" type="checkbox" id="denied" name="denied" value="1">
      @endif
          Application Denied
      </label>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="denial">Application Denial Reason</label>
    </div>
    <div class="col-md-5">
        <textarea class="form-control" rows="5" id="denial" name="denial">{{ old('denial') ?? $program->denial }}</textarea>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="denial_details">Denial Details</label>
    </div>
    <div class="col-md-5">
        <textarea class="form-control" rows="5" id="denial_details" name="denial_details">{{ old('denial_details') ?? $program->denial_details }}</textarea>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="notes">Notes</label>
    </div>
    <div class="col-md-5">
        <textarea class="form-control" rows="5" id="notes" name="notes">{{ old('notes') ?? $program->notes }}</textarea>
    </div>
</div>

@section('custom-js')
<script>
    $(".typeahead[name='client']").typeahead({
        provide: "typeahead",
        source: {!! $clients !!},
        showHintOnFocus: "all",
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
    }).on('blur', function(){
        if($(this).val() == "") {
            $("input[name='client_id']").val('');
        }
    });
</script>
@endsection
