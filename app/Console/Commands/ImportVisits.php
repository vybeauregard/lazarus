<?php

namespace App\Console\Commands;

use Facades\App\Client;
use App\Counselor;
use App\Family;
use App\Income;
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
        $year = $this->choice('What year do you need to import?', [2017, 2018], 0);
        $file = storage_path('app/import/visits_' . $year . '.csv');
        $data = explode("\n", File::get($file));
        $header = str_getcsv(array_shift($data));
        $data = collect($data)->map(function($line) use ($header) {
            $array = str_getcsv($line);
            $visitor = array_combine($header, $array);
            return $this->interpretVisit($visitor);
        });
        //items are matched with their column headings
        dump($data->first());

    }

    private function interpretVisit($visitor)
    {
        dump($visitor);
        $visitordata = [
            'first_name' => $visitor['First Name'],
            'last_name' => $visitor['Last Name'],
            'address1' => $visitor['Address'],
            'zip' => $visitor['Zip Code'],
            'gender' => $visitor['Gender'],
            'ethnicity' => $visitor['Ethnicity'],
            'birth_country' => $visitor['Country of Birth'],
            'apartment_name' => $visitor['Apartment Complex'],
            'dob' => Carbon::parse($visitor['Date of Birth']),
            'date' => Carbon::parse($visitor['Date of STPLM Visit']),
            'monthly_income' => $visitor['Monthly Income'],
            'family' => [
                [
                    'name' => $visitor['Spouse'],
                    'relationship' => 'spouse'
                ],
            ]
        ];
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

//        dd($visitor);
        $client = Client::findByNameOrCreate($visitordata);

        $visitordata['counselor_id'] = Counselor::findByFirstName($visitor['Counselor']);

        $visit = $client->visit()->save(new Visit($visitordata));

//        dd('one done');
    }
}
