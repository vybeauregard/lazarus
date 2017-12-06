<?php

use App\Parish;
use Illuminate\Database\Seeder;

class ParishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parishes = collect([
            "St. Paul's",
            "Resurrection",
            "Christ Church",
            "St. Rita's"
        ]);
        $parishes->each(function($parish) {
            Parish::create(['name' => $parish]);
        });
    }
}
