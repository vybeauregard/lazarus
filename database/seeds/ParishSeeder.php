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
        $visits = collect([
            "St. Paul's",
            "Resurrection",
            "Christ Church",
            "St. Rita's"
        ]);
        $visits->each(function($visit) {
            Parish::create(['name' => $visit]);
        });
//        $visit = factory(App\Parish::class, 50)->create();
    }
}
