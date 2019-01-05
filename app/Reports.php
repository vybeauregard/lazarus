<?php

namespace App;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Jenssegers\Model\Model;

class Reports extends Model
{
    public $start_date;
    public $end_date;

    public $totalVisits;
    public $newClients;
    public $repeatNewClients;
    public $averageWeeklyVisitors;
    public $averageWeeklyTurnAways;
    public $oneTimeVisitors;
    public $twoTimeVisitors;
    public $threeOrMoreTimeVisitors;
    public $maleClients;
    public $femaleClients;
    public $ageRanges;
    public $householdSizes;
    public $arha_sec8;
    public $birthplaces;
    public $ethnicities;
    public $zipcodes;
    public $averageMonthlyIncome;
    public $aliveReferrals;

    protected $queries = [
        'getTotalVisits',
        'getNewClients',
        'getRepeatNewClients',
        'getAverageWeeklyVisitors',
        'getAverageWeeklyTurnAways',
        'getOneTimeVisitors',
        'getTwoTimeVisitors',
        'getThreeOrMoreTimeVisitors',
        'getMaleClients',
        'getFemaleClients',
        'getAgeRanges',
        'getHouseholdSizes',
        'getARHA_Section8Clients',
        'getBirthplaces',
        'getEthnicities',
        'getZipcodes',
        'getAverageMonthlyIncome',
        'getAliveReferrals',
    ];

    public function validateDates()
    {
        request()->validate([
            'start_date' => 'required|date_format:m/d/Y',
            'end_date' => 'required|date_format:m/d/Y',
        ]);
        request()->merge([
            'start_date' => Carbon::createFromFormat('m/d/Y', request('start_date')),
            'end_date' => Carbon::createFromFormat('m/d/Y', request('end_date')),
        ]);

        $this->start_date = request('start_date');
        $this->end_date = request('end_date');

        foreach($this->queries as $query) {
            $this->$query();
        }
    }

    public function getTotalVisits()
    {
        $this->totalVisits = DB::table('visits')
            ->selectRaw('COUNT(*) AS total_visits')
            ->selectRaw('COUNT(DISTINCT client_id) AS unique_clients')
            ->whereBetween('date', [$this->start_date->startOfDay(), $this->end_date->endOfDay()])
            ->get()
            ->first();
    }

    public function getNewClients()
    {
        $this->newClients = DB::table('clients')
            ->selectRaw('COUNT(*) AS new_clients')
            ->whereBetween('date', [$this->start_date->startOfDay(), $this->end_date->endOfDay()])
            ->get()
            ->first()->new_clients;
    }

    public function getRepeatNewClients()
    {
        $this->repeatNewClients = DB::table('clients as c')
            ->select('c.id')
            ->selectRaw('COUNT(*) AS repeats')
            ->leftJoin('visits as v', 'v.client_id', '=', 'c.id')
            ->whereBetween('c.date', [$this->start_date->startOfDay(), $this->end_date->endOfDay()])
            ->groupBy('c.id')
            ->get()
            ->first()->repeats;
    }

    public function getAverageWeeklyVisitors()
    {
        $this->averageWeeklyVisitors = ceil(DB::table('visits')
            ->select('date')
            ->selectRaw('COUNT(*) as visits')
            ->whereRaw('WEEKDAY(date) = 1')
            ->whereBetween('date', [$this->start_date->startOfDay(), $this->end_date->endOfDay()])
            ->groupBy('date')
            ->get()
            ->avg('visits'));
    }

    public function getAverageWeeklyTurnAways()
    {
        $this->averageWeeklyTurnAways = ceil(DB::table('turn_aways')
            ->select('total')
            ->whereBetween('date', [$this->start_date->startOfDay(), $this->end_date->endOfDay()])
            ->get()
            ->avg('total'));
    }

    private function getVisitorCountByNumberOfVisits($count)
    {
        if($count == 3) {
            $count_clause = 'COUNT(*) > 2';
        } else {
            $count_clause = "COUNT(*) = $count";
        }
        return DB::table('clients as c')
            ->select('c.id')
            ->selectRaw('COUNT(*) as repeats')
            ->selectRaw('WEEKDAY(v.date) AS day_of_week')
            ->leftJoin('visits as v', 'v.client_id', '=', 'c.id')
            ->whereBetween('v.date', [$this->start_date->startOfDay(), $this->end_date->endOfDay()])
            ->groupBy('c.id', 'day_of_week')
            ->havingRaw($count_clause)
            ->get()
            ->count();
    }

    public function getOneTimeVisitors()
    {
        $this->oneTimeVisitors = $this->getVisitorCountByNumberOfVisits(1);
    }

    public function getTwoTimeVisitors()
    {
        $this->twoTimeVisitors = $this->getVisitorCountByNumberOfVisits(2);
    }

    public function getThreeOrMoreTimeVisitors()
    {
        $this->threeOrMoreTimeVisitors = $this->getVisitorCountByNumberOfVisits(3);
    }

    private function getVisitorCountByGender($gender)
    {
        return DB::table('clients as c')
            ->selectRaw('COUNT(*) as count')
            ->leftJoin('visits as v', 'v.client_id', '=', 'c.id')
            ->having('c.gender', $gender)
            ->whereBetween('v.date', [$this->start_date->startOfDay(), $this->end_date->endOfDay()])
            ->groupBy('c.gender')
            ->get()
            ->first()
            ->count;
    }

    public function getMaleClients()
    {
        $this->maleClients = $this->getVisitorCountByGender('Male');
    }

    public function getFemaleClients()
    {
        $this->femaleClients = $this->getVisitorCountByGender('Female');
    }

    public function getAgeRanges($cohort_size = 15)
    {
        $this->ageRanges = DB::query()
            ->selectRaw("CONCAT($cohort_size*FLOOR(age/$cohort_size), '-', $cohort_size*FLOOR(age/$cohort_size) + $cohort_size - 1) as cohort")
            ->selectRaw('COUNT(*) as count')
            ->fromSub(function ($query) {
                $query->selectRaw('TIMESTAMPDIFF(YEAR,c.dob,v.date) AS age')
                    ->selectRaw('COUNT(*) as count')
                    ->from('clients as c')
                    ->leftJoin('visits as v', 'v.client_id', '=', 'c.id')
                    ->whereBetween('v.date', [$this->start_date->startOfDay(), $this->end_date->endOfDay()])
                    ->where('c.dob', '<>', '')
                    ->having('age', '>=', 0)
                    ->groupBy('age');
            }, 'age_table')
            ->groupBy('cohort')
            ->get();
    }

    public function getHouseholdSizes()
    {
        $this->householdSizes = DB::query()
            ->select('household_size')
            ->selectRaw('COUNT(*) AS count')
            ->fromSub(function ($query){
                $query->selectRaw('IF(f.client_id IS NULL, COUNT(*), COUNT(*) + 1) AS household_size')
                    ->from('clients as c')
                    ->leftJoin('visits AS v', 'v.client_id', '=', 'c.id')
                    ->whereBetween('v.date', [$this->start_date->startOfDay(), $this->end_date->endOfDay()])
                    ->leftJoin('families as f', 'f.client_id', '=', 'c.id')
                    ->groupBy('c.id');
            }, 'household_count')
            ->groupBy('household_size')
            ->get();
    }

    public function getARHA_Section8Clients()
    {
        $this->arha_sec8 = DB::table('income')
            ->selectRaw('COUNT(*) AS count')
            ->whereBetween('date', [$this->start_date->startOfDay(), $this->end_date->endOfDay()])
            ->where(function ($query) {
                $query->where('arha', '=', '1')
                    ->orWhere('section_8', '=', '1');
            })
            ->get()->first()->count;

    }

    public function getBirthplaces()
    {
        $this->birthplaces = DB::table('clients AS c')
            ->select('birth_country')
            ->selectRaw('COUNT(*) AS count')
            ->leftJoin('visits AS v', 'v.client_id', '=', 'c.id')
            ->whereBetween('v.date', [$this->start_date->startOfDay(), $this->end_date->endOfDay()])
            ->whereNotIn('birth_country', ['', '??'])
            ->groupBy('birth_country')
            ->orderByDesc('count')
            ->get();
    }

    public function getEthnicities()
    {
        $this->ethnicities = DB::table('clients AS c')
            ->select('ethnicity')
            ->selectRaw('COUNT(*) AS count')
            ->leftJoin('visits AS v', 'v.client_id', '=', 'c.id')
            ->whereBetween('v.date', [$this->start_date->startOfDay(), $this->end_date->endOfDay()])
            ->where('ethnicity', '<>', '')
            ->groupBy('ethnicity')
            ->orderByDesc('count')
            ->get();
    }

    public function getZipCodes()
    {
        $this->zipcodes = DB::table('clients AS c')
            ->select('zip')
            ->selectRaw('COUNT(*) AS count')
            ->leftJoin('visits AS v', 'v.client_id', '=', 'c.id')
            ->leftJoin('contacts AS ct', function ($join) {
                $join->on('ct.contactable_id', '=', 'c.id');
                $join->where('ct.contactable_type', '=', Client::class);
            })
            ->whereBetween('v.date', [$this->start_date->startOfDay(), $this->end_date->endOfDay()])
            ->where('zip', '<>', '')
            ->whereRaw('CHAR_LENGTH(zip) = 5')
            ->groupBy('zip')
            ->orderByDesc('count')
            ->get();
    }

    public function getAverageMonthlyIncome()
    {
        $this->averageMonthlyIncome = DB::table('income')
            ->selectRaw('CEIL(AVG(monthly_income)) AS average_monthly_income')
            ->whereBetween('date', [$this->start_date->startOfDay(), $this->end_date->endOfDay()])
            ->get()->first()->average_monthly_income;

    }

    public function getAliveReferrals()
    {
        $this->aliveReferrals = DB::table('clients AS c')
            ->selectRaw('COUNT(*) AS count')
            ->leftJoin('visits AS v', 'v.client_id', '=', 'c.id')
            ->whereBetween('v.date', [$this->start_date->startOfDay(), $this->end_date->endOfDay()])
            ->where('source', 'like', '%alive%')
            ->get()->first()->count;

//        SELECT COUNT(*) as count
//FROM clients c
//LEFT JOIN visits v ON v.client_id = c.id
//WHERE source like '%alive%'

    }
}
