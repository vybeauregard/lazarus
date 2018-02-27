@extends('layouts.app')

@section('title')
| Clients | Edit {{ $client->name }}
@endsection

@section('content')
<h3>{{ $client->name }}</h3>
<form style="margin:14px;" class="" method="post" action="{{ route('clients.update', $client->id) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    @include('clients.form')

    @if($client->income->count())
    <hr />

    <div class="row income-display">
        <div class="col-md-9">
            <h4>Income</h4>
        </div>
    </div>
    <table class="table table-striped income-display">
        <thead>
            <tr>
                <th>date</th>
                <th>Total Monthly Income</th>
                <th>Unemployed</th>
                <th>Homeless</th>
                <th>ARHA</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach($client->income as $income)
            <tr data-income-id="{{ $income->id }}">
                <td><a href="{{ route('clients.income.show', [$client->id, $income->id]) }}">{{ $income->date->format('m/d/Y') }}</a></td>
                <td>${{ number_format($income->monthly_income) ?? '0.00' }}</td>
                <td><i class="glyphicon {{ $income->unemployed == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></td>
                <td><i class="glyphicon {{ $income->homeless == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></td>
                <td><i class="glyphicon {{ $income->arha == 1 ? 'glyphicon-ok success' : 'glyphicon-remove danger' }}"></i></td>
                <td><a class="btn btn-link glyphicon glyphicon-trash no-underline"
                            data-toggle="confirmation"
                            data-title="Remove this Income data?"
                            data-on-confirm="removeIncome"></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    @endif
    <input type="submit" name="submit" value="Save Client and Add Income information" class="btn btn-success" />

    @if($client->family->count())
    <hr />

    <div class="row family-display">
        <div class="col-md-9">
            <h4>Family Members</h4>
        </div>
    </div>
    <table class="table table-striped family-display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Relationship</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
    @foreach($client->family as $family)
            <tr data-family-id="{{ $family->id }}">
                <td><a href="{{ route('clients.families.edit', [$client->id, $family->id]) }}">{{ $family->name }}</a></td>
                <td>{{ str_replace("_", " ", title_case($family->relationship)) }}</td>
                <td><a class="btn btn-link glyphicon glyphicon-trash no-underline"
                            data-toggle="confirmation"
                            data-title="Remove this Family member?"
                            data-on-confirm="removeFamilyMember"></a>
                </td>
            </tr>
    @endforeach
        </tbody>
    </table>
    @endif
    <input type="submit" name="submit" value="Save Client and Add Family Member" class="btn btn-success" />

    <input type="submit" name="submit" value="Save Client" class="btn btn-primary" />
</form>
@endsection

@section('custom-js')
<script>
function removeFamilyMember() {
    var family_id = $(this).closest('tr').data('family-id');
    var url = "{{ route('clients.families.destroy', [$client->id, 0]) }}";
    var ajax = {
        data: {
            _token: $("input[name='_token']").val(),
            _method: "DELETE"
        },
        url: url.substr(0, (url.length - 1)) + family_id
    };
    $.post(ajax).then(function(){
        $row = $('tr[data-family-id="'+family_id+'"]');
        if ($row.siblings().length) {
            $row.remove();
        } else {
            $(".family-display").remove();
        }
    });
}
function removeIncome() {
    var income_id = $(this).closest('tr').data('income-id');
    var url = "{{ route('clients.income.destroy', [$client->id, 0]) }}";
    var ajax = {
        data: {
            _token: $("input[name='_token']").val(),
            _method: "DELETE"
        },
        url: url.substr(0, (url.length - 1)) + income_id
    };
    $.post(ajax).then(function(){
        $row = $('tr[data-income-id="'+income_id+'"]');
        if ($row.siblings().length) {
            $row.remove();
        } else {
            $(".income-display").remove();
        }
    });
}
</script>
@endsection

