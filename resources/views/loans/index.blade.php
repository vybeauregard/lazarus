@extends('layouts.app')

@section('content')
<h3>Loans</h3>
<a href="{{ route('loans.create') }}" class="btn btn-success">New Loan</a>
{{ csrf_field() }}

<table class="table table-striped" style="width:500px;">
    <thead>
        <tr>
            <th>Client</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
    @foreach($loans as $loan)
        <tr data-loan-id="{{ $loan->id }}">
            <td><a href="{{ route('loans.show', $loan->id) }}">{{ $loan->client->name }}</a></td>
            <td>{{ $loan->type }}</td>
            <td>${{ $loan->amount }}</td>
            <td><button onclick="removeLoan({{ $loan->id }})" class="btn btn-link popconfirm glyphicon glyphicon-trash no-underline" data-confirm-title="Remove Loan" data-confirm-content="Are you sure?" ></button></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection

@section('custom-js')
<script>
function removeLoan(loan_id) {
    var url = "{{ route('loans.destroy', 0) }}";
    var ajax = {
        data: {
            _token: $("input[name='_token']").val(),
            _method: "DELETE"
        },
        url: url.substr(0, (url.length - 1)) + loan_id
    };
    $.post(ajax).then(function (){
        $('tr[data-loan-id="'+loan_id+'"]').remove();
    });
}
</script>
@endsection

