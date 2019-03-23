<?php

namespace App\Console\Commands;

use DB;
use Schema;
use Illuminate\Console\Command;

class TruncateTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:truncate-tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncate imported tables from the database. FOR DEPLOYMENT ONLY';

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
        $tables = [
            'clients',
            'contacts',
            'counselors',
            'families',
            'income',
            'loans',
            'parishes',
            'requests',
            'turn_aways',
            'visits'
        ];
        foreach($tables as $table) {
            DB::table($table)->truncate();
        }
    }
}
