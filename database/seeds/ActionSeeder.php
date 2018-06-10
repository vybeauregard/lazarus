<?php

use App\Action;
use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Action::reguard();
        $actions = collect([
            "St. Pauls Lazarus Ministry",
            "ALIVE",
            "Old Presbyterian Meeting House",
            "Food Bag",
        ]);
        $actions->each(function($action) {
            Action::create([
                'type' => $action
            ]);
        });
    }
}
