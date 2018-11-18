<?php

namespace App\Console\Commands;

use Facades\App\Client;
use App\Counselor;
use App\Family;
use App\Income;
use Facades\App\Request as RequestFacade;
use App\Request;
use App\Visit;
use Carbon\Carbon;
use File;
use Illuminate\Console\Command;

class ImportVisits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-visits';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Client Visits from csv';

    protected $year = 0;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->year = $this->choice('What year do you need to import?', [2017, 2018], 0);
        $file = storage_path('app/import/visits_' . $this->year . '.csv');
        $data = explode("\n", File::get($file));
        $header = str_getcsv(array_shift($data));
        $counter = 0;
        $data = collect($data)->map(function($line) use ($header, &$counter) {
            $array = str_getcsv($line);
            $visitor = array_combine($header, $array);
            $counter++;
            return $this->interpretVisit($visitor);
        });
        $this->line("$counter records imported for {$this->year}");
        //items are matched with their column headings
    }

    private function interpretVisit($visitor)
    {
        $visitordata = [
            'first_name' => $visitor['First Name'],
            'last_name' => $visitor['Last Name'],
            'address1' => $visitor['Address'],
            'zip' => $visitor['Zip Code'],
            'gender' => $visitor['Gender'],
            'ethnicity' => $visitor['Ethnicity'],
            'birth_country' => $visitor['Country of Birth'],
            'apartment_name' => $visitor['Apartment Complex'],
            'dob' => Carbon::parse($visitor['Date of Birth'])->isPast() ? Carbon::parse($visitor['Date of Birth']) : Carbon::parse($visitor['Date of Birth'])->subYears(100),
            'date' => Carbon::parse($visitor['Date of STPLM Visit']),
            'client_date' => $visitor['New to STP'] == "Yes" ? Carbon::parse($visitor['Date of STPLM Visit']) : Carbon::create(2016, 1, 1)->subDay()->format('Y-m-d'),
            'monthly_income' => $visitor['Monthly Income'] == "Homeless" ? "0.00" : $visitor['Monthly Income'],
            'source' => $visitor['Source'],
            'type' => RequestFacade::getTypeId($visitor['Help Requested']),
            'action' => $visitor['Action Taken'],
        ];
        if (is_numeric($visitor['Action Taken'])) {
            $visitordata['amount'] = $visitor['Action Taken'];
            $visitordata['action'] = "";
        } else {
            $visitordata['action'] = $visitor['Action Taken'];
        }
        if ($visitor['Spouse'] !== "") {
            $visitordata['family'] = [
                [
                    'name' => $visitor['Spouse'],
                    'relationship' => 'spouse'
                ],
            ];
        }

        if ($visitordata['address1'] == "Homeless") {
            $visitordata['homeless'] = true;
        }

        for ($i=1;$i<=$visitor['No Of Children Under 18'];$i++) {
            $visitordata['family'][] = [
                'name' => "child $i",
                'relationship' => "child"
            ];
        }

        for ($i=1;$i<=$visitor['Children Over 18'];$i++) {
            $visitordata['family'][] = [
                'name' => "child over 18 $i",
                'relationship' => "other adult"
            ];
        }

        for ($i=1;$i<=$visitor['Other Adults'];$i++) {
            $visitordata['family'][] = [
                'name' => "adult $i",
                'relationship' => "other adult"
            ];
        }
        if ($visitordata['dob'] == Carbon::today()) {
            unset($visitordata['dob']);
        }
        if ($visitordata['date'] != $visitordata['client_date']) {
            $vdata = $visitordata;
            $vdata['date'] = $vdata['client_date'];
            $client = Client::findByNameOrCreate($vdata);
        } else {
            $client = Client::findByNameOrCreate($visitordata);
        }

        if ($visitor['Counselor'] == "") {
            dump($visitordata);
            throw new \Exception('No counselor entered for visitor');
        }
        $visitordata['counselor_id'] = Counselor::findByFirstName($visitor['Counselor']);

        if (is_null($visitordata['counselor_id'])) {
            throw new \Exception('No counselor match for ' . $visitor['Counselor']);
        }

        //look at existing visits. if date and counselor id match, attach this request to that visit.
        //otherwise create a new visit

        $visit = new Visit($visitordata);

        if($client->visit->count() > 1) {
            if ($client->visit->where('date', $visitordata['date'])->count()) {
                $visit = $client->visit->where('date', $visitordata['date'])->first();
            }
        }

        $visit = $client->visit()->save($visit);

        $request = $visit->requests()->save(new Request($visitordata));

    }
}
