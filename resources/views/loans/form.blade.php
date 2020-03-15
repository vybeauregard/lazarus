<div class="form-group row">
    <div class="col-md-2">
        <label for="request_date">Request Date</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control datepicker" id="request_date" name="request_date_{{ csrf_token() }}" data-provide="datepicker" value="{{ old('request_date') ?? ($loan->request_date ? $loan->request_date->format('m/d/Y') : '') }}" />
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
        <input type="text"
               class="form-control typeahead"
               data-provide="typeahead"
               autocomplete="off"
               id="client"
               name="client_{{ csrf_token() }}"
               placeholder="Type a name or click to select"
               value="{{ old('client') ?? ($loan->client ? $loan->client->name : '') }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="hidden" name="client_id" value="{{ old('client_id') ?? $loan->client_id }}" />
    </div>
    <div class="col-md-2">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="date">Loan Date</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control datepicker" id="date" name="date_{{ csrf_token() }}" data-provide="datepicker" value="{{ old('date') ?? ($loan->date ? $loan->date->format('m/d/Y') : '') }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    </div>
    <div class="col-md-2">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="type">Type</label>
    </div>
    <div class="col-md-3 input-group">
        <input type="text" class="form-control" id="type" name="type" value="{{ old('type') ?? $loan->type }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="amount">Amount</label>
    </div>
    <div class="col-md-3 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        <input type="number" min="0" class="form-control" id="amount" name="amount" value="{{ old('amount') ?? $loan->amount }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="due_date">Due Date</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control datepicker" id="due_date" name="due_date_{{ csrf_token() }}" data-provide="datepicker" value="{{ old('due_date') ?? ($loan->due_date ? $loan->due_date->format('m/d/Y') : '') }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    </div>
    <div class="col-md-2">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="remaining">Amount Remaining</label>
    </div>
    <div class="col-md-3 input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
        <input type="number" min="0" class="form-control" id="remaining" name="remaining" value="{{ old('remaining') ?? $loan->remaining }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="total_payments">Total Payments</label>
    </div>
    <div class="col-md-1 input-group">
        <input type="number" min="0" class="form-control" id="total_payments" name="total_payments" value="{{ old('total_payments') ?? $loan->total_payments }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="payment_count">Number of Payments</label>
    </div>
    <div class="col-md-1 input-group">
        <input type="number" min="0" class="form-control" id="payment_count" name="payment_count" value="{{ old('payment_count') ?? $loan->payment_count }}" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="last_payment">Last Payment</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control datepicker" id="last_payment" name="last_payment_{{ csrf_token() }}" data-provide="datepicker" value="{{ old('last_payment') ?? ($loan->last_payment ? $loan->last_payment->format('m/d/Y') : '') }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    </div>
    <div class="col-md-2">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2 form-check form-check-inline">
      <label class="form-check-label">
          @if(old('closed') && old('closed') == 1)
            <input class="form-check-input" type="checkbox" id="closed" name="closed" value="1" checked>
          @elseif($loan->closed == 1)
            <input class="form-check-input" type="checkbox" id="closed" name="closed" value="1" checked>
          @else
            <input class="form-check-input" type="checkbox" id="closed" name="closed" value="1">
          @endif
          Closed
      </label>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2 form-check form-check-inline">
      <label class="form-check-label">
          @if(old('budgeted') && old('budgeted') == 1)
            <input class="form-check-input" type="checkbox" id="budgeted" name="budgeted" value="1" checked>
          @elseif($loan->budgeted == 1)
            <input class="form-check-input" type="checkbox" id="budgeted" name="budgeted" value="1" checked>
          @else
            <input class="form-check-input" type="checkbox" id="budgeted" name="budgeted" value="1">
          @endif
          Budgeted
      </label>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        <label for="budget_date">Budget Date</label>
    </div>
    <div class="col-md-2 input-group">
        <input type="text" class="form-control datepicker" id="budget_date" name="budget_date_{{ csrf_token() }}" data-provide="datepicker" value="{{ old('budget_date') ?? ($loan->budget_date ? $loan->budget_date->format('m/d/Y') : '') }}" />
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    </div>
    <div class="col-md-2">
    </div>
</div>


@section('custom-js')
<script>
    $(".typeahead[name='client_{{ csrf_token() }}']").typeahead({
        provide: "typeahead",
        source: @json($clientsTypeahead),
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
