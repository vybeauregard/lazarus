@extends('layouts.app')

@section('title')
| Reports
@endsection

@section('content')
<div class="container">

    <h3>Reports</h3>
            <div class="form-group row">
        @if (session('error'))
        <div class="alert alert-danger col-md-3 col-md-offset-1">{{ session('error') }}</div>
        @endif
    </div>
    <form method="post">
        <div class="text-center">

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="start_date" class="pull-right">Start Date</label>
                </div>
                <div class="col-md-2 input-group">
                    <input type="text" class="form-control datepicker" id="start_date" name="start_date_{{ csrf_token() }}" data-provide="datepicker" value="{{ old('start_date') ?? isset($reports) ? $reports->start_date->format('m/d/Y') : Carbon\Carbon::now()->startOfMonth()->format('m/d/Y') }}" />
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="end_date" class="pull-right">End Date</label>
                </div>
                <div class="col-md-2 input-group">
                    <input type="text" class="form-control datepicker" id="end_date" name="end_date_{{ csrf_token() }}" data-provide="datepicker" value="{{ old('end_date') ?? isset($reports) ? $reports->end_date->format('m/d/Y') : Carbon\Carbon::now()->format('m/d/Y') }}" />
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>

            @if(isset($reports))
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="report_type" class="pull-right">Report Type</label>
                </div>
                <div class="col-md-3">
                    <select class="form-control" id="report_type">
                        <option disabled selected>Choose a report type</option>
                        @foreach([
                            'total-visits' => 'Total Visits',
                            'total-clients' => 'Total Clients',
                            'new-clients' => 'New Clients',
                            'repeat-new-clients' => 'Repeat New Clients',
                            'avg-weekly-visitors' => 'Average Weekly Visitors',
                            'avg-weekly-turnaways' => 'Average Weekly Turnaways',
                            'one-time-visitors' => 'One Time Visitors',
                            'two-time-visitors' => 'Two Time Visitors',
                            'three-time-visits' => 'Three or More Time Visitors',
                            'gender' => 'Gender',
                            'age-ranges' => 'Age Ranges',
                            'number-in-household' => 'Number in Household',
                            'children-18-under' => 'Children 18 & Under',
                            'arha-sec-8' => 'ARHA/Section 8',
                            'birthplace' => 'Birthplace',
                            'ethnicity' => 'Ethnicity',
                            'zipcode' => 'Zip code',
                            'avg-income' => 'Average Income',
                            'multiple-assistance' => 'Multiple Forms of Assistance',
                            'help-request-type' => 'Help Request Type',
                            'alive-referrals' => 'ALIVE Referrals',
                            'opmh-referrals' => 'OPMH referrals',
                            'amount-owed' => 'Amount Owed',
                        ] as $report_type => $name)
                        <option value="{{ $report_type }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            @csrf
            <div class="form-group row">
                <div class="col-md-2 col-md-offset-2">
                    <button class="btn btn-primary">Run Report</button>
                </div>
            </div>
        </div>
    </form>

    @if(isset($reports))
    <div id="report">

        <div class="form-group" id="total-visits" style="display:none;">
        <h2>Total Visits:</h2>
            {{ $reports->totalVisits->total_visits }}
        </div>
        <div class="form-group" id="total-clients" style="display:none;">
        <h2>Total Clients:</h2>
            {{ $reports->totalVisits->unique_clients }}
        </div>
        <div class="form-group" id="new-clients" style="display:none;">
        <h2>New Clients:</h2>
            <span class="count">{{ $reports->newClients }}</span>
            <span class="percent">{{ ceil(100 * $reports->newClients / $reports->totalVisits->unique_clients) }}%</span>
        </div>
        <div class="form-group" id="repeat-new-clients" style="display:none;">
        <h2>Repeat New Clients:</h2>
            <span class="count">{{ $reports->repeatNewClients }}</span>
            <span class="percent">{{ ceil(100 * $reports->repeatNewClients / $reports->totalVisits->unique_clients) }}%</span>
        </div>
        <div class="form-group" id="avg-weekly-visitors" style="display:none;">
        <h2>Average weekly visitors:</h2>
            {{ $reports->averageWeeklyVisitors }}
        </div>
        <div class="form-group" id="avg-weekly-turnaways" style="display:none;">
        <h2>Average weekly turn-aways:</h2>
            {{ $reports->averageWeeklyTurnAways }}
        </div>
        <div class="form-group" id="one-time-visitors" style="display:none;">
        <h2>One-time visitors:</h2>
            <span class="count">{{ $reports->oneTimeVisitors }}</span>
            <span class="percent">{{ ceil(100 * $reports->oneTimeVisitors / $reports->totalVisits->unique_clients) }}%</span>
        </div>
        <div class="form-group" id="two-time-visitors" style="display:none;">
        <h2>Two-time visitors:</h2>
            <span class="count">{{ $reports->twoTimeVisitors }}</span>
            <span class="percent">{{ ceil(100 * $reports->twoTimeVisitors / $reports->totalVisits->unique_clients) }}%</span>
        </div>
        <div class="form-group" id="three-time-visits" style="display:none;">
        <h2>Three or more-time visitors:</h2>
            <span class="count">{{ $reports->threeOrMoreTimeVisitors }}</span>
            <span class="percent">{{ ceil(100 * $reports->threeOrMoreTimeVisitors / $reports->totalVisits->unique_clients) }}%</span>
        </div>

        <div class="form-group" id="gender" style="display:none;">
            <h2>Gender:</h2>
            <div class="row">
                <div class="col-md-3">
                    <h3>Male:</h3>
                    <span class="count">{{ $reports->maleClients }}</span>
                    <span class="percent">{{ ceil(100 * $reports->maleClients / $reports->totalVisits->total_visits) }}%</span>
                </div>
                <div class="col-md-3">
                    <h3>Female:</h3>
                    <span class="count">{{ $reports->femaleClients }}</span>
                    <span class="percent">{{ ceil(100 * $reports->femaleClients / $reports->totalVisits->total_visits) }}%</span>
                </div>
            </div>
        </div>
        <div class="form-group row" id="age-ranges" style="display:none;">
            <div class="col-md-4">
                <h2>Age ranges:</h2>
                <table class="table">
                    <thead>
                        <th>cohort</th>
                        <th>count</th>
                        <th>percent</th>
                    </thead>
                    <tbody>
                    @foreach($reports->ageRanges as $cohort)
                    <tr>
                        <td>{{ $cohort->cohort }}</td>
                        <td>{{ $cohort->count }}</td>
                        <td>{{ ceil(100 * $cohort->count / $reports->ageRanges->sum('count')) }}%</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-group row" id="number-in-household" style="display:none;">
            <div class="col-md-4">
                <h2>Number in household:</h2>
                <table class="table">
                    <thead>
                        <th>household size</th>
                        <th>count</th>
                        <th>percent</th>
                    </thead>
                    <tbody>
                    @foreach($reports->householdSizes as $household)
                    <tr>
                        <td>{{ $household->household_size }}</td>
                        <td>{{ $household->count }}</td>
                        <td>{{ ceil(100 * $household->count / $reports->householdSizes->sum('count')) }}%</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-group" id="children-18-under" style="display:none;">
            <h2>Children 18 and under:</h2>
            <span class="count">{{ $reports->under18 }}</span> <span class="percent"></span>
        </div>
        <div class="form-group" id="arha-sec-8" style="display:none;">
            <h2>ARHA/Section 8 clients:</h2>
            <div class="row">
                <div class="col-md-3">
                    <h3>ARHA</h3>
                    <span class="count">{{ $reports->arha_sec8->arha }}</span> <span class="percent">{{ ceil(100 * $reports->arha_sec8->arha / $reports->totalVisits->total_visits) }}%</span>
                </div>
                <div class="col-md-3">
                    <h3>Section 8</h3>
                    <span class="count">{{ $reports->arha_sec8->section_8 }}</span> <span class="percent">{{ ceil(100 * $reports->arha_sec8->section_8 / $reports->totalVisits->total_visits) }}%</span>
                </div>
                <div class="col-md-3">
                    <h3>Both</h3>
                    <span class="count">{{ $reports->arha_sec8->both }}</span> <span class="percent">{{ ceil(100 * $reports->arha_sec8->both / $reports->totalVisits->total_visits) }}%</span>
                </div>
            </div>
        </div>
        <div class="form-group row" id="birthplace" style="display:none;">
            <div class="col-md-4">
                <h2>Birthplace:</h2>
                <table class="table">
                    <thead>
                        <th>country</th>
                        <th>count</th>
                        <th>percent</th>
                    </thead>
                    <tbody>
                    @foreach($reports->birthplaces as $birthplace)
                    <tr>
                        <td>{{ $birthplace->birth_country }}</td>
                        <td>{{ $birthplace->count }}</td>
                        <td>{{ ceil(100 * $birthplace->count / $reports->birthplaces->sum('count')) }}%</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-group row" id="ethnicity" style="display:none;">
            <div class="col-md-4">
                <h2>Ethnicity:</h2>
                <table class="table">
                    <thead>
                        <th>ethnicity</th>
                        <th>count</th>
                        <th>percent</th>
                    </thead>
                    <tbody>
                    @foreach($reports->ethnicities as $ethnicity)
                    <tr>
                        <td>{{ $ethnicity->ethnicity }}</td>
                        <td>{{ $ethnicity->count }}</td>
                        <td>{{ ceil(100 * $ethnicity->count / $reports->ethnicities->sum('count')) }}%</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-group row" id="zipcode" style="display:none;">
            <div class="col-md-4">
                <h2>Zipcode:</h2>
                <table class="table">
                    <thead>
                        <th>zip code</th>
                        <th>count</th>
                        <th>percent</th>
                    </thead>
                    <tbody>
                    @foreach($reports->zipcodes as $zipcode)
                    <tr>
                        <td>{{ $zipcode->zip }}</td>
                        <td>{{ $zipcode->count }}</td>
                        <td>{{ ceil(100 * $zipcode->count / $reports->zipcodes->sum('count')) }}%</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="form-group" id="avg-income" style="display:none;">
            <h2>Average income:</h2>
            ${{ $reports->averageMonthlyIncome }}
        </div>
        <div class="form-group" id="multiple-assistance" style="display:none;">
            <h2>Multiple forms of income assistance:</h2>
            <span class="badge">coming soon</span>
            <span class="count"></span> <span class="percent"></span>
        </div>
        <div class="form-group" id="help-request-type" style="display:none;">
            <div class="col-md-4">
                <h2>Help request type:</h2>
                <table class="table">
                    <thead>
                        <th>Request</th>
                        <th>count</th>
                        <th>percent</th>
                    </thead>
                    <tbody>
                    @foreach($reports->requestTypes as $request_type)
                    <tr>
                        <td>{{ $request_type->type }}</td>
                        <td>{{ $request_type->count }}</td>
                        <td>{{ ceil(100 * $request_type->count / $reports->requestTypes->sum('count')) }}%</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <span class="count"></span> <span class="percent"></span>
        </div>
        <div class="form-group" id="alive-referrals" style="display:none;">
            <h2>ALIVE Referrals:</h2>
            <span class="count">{{ $reports->aliveReferrals }}</span>
            <span class="percent">{{ ceil(100 * $reports->aliveReferrals / $reports->totalVisits->total_visits) }}%</span>
        </div>
        <div class="form-group" id="opmh-referrals" style="display:none;">
            <h2>OPMH Referrals:</h2>
            <span class="badge">coming soon</span>
            <span class="count"></span> <span class="percent"></span>
        </div>
        <div class="form-group" id="amount-owed" style="display:none;">
            <h2>Amount owed:</h2>
            <span class="badge">tbd</span>
        </div>
    </div>
    @endif
</div>
@endsection

@section('custom-js')
<script>
    $('#report_type').on('change', function(){
        $('#report .form-group').hide();
        var $report = $('#report #' + $(this).val());
        $report.show();
    });
</script>
@endsection
