<?php

namespace App\Console\Commands;

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
            $array = array_combine($header, $array);
            return $array;
        });
        //items are matched with their column headings
        dump($data);

    }
}
