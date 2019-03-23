<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(ParishSeeder::class);
         $this->call(CounselorSeeder::class);
         //$this->call(UserSeeder::class);
         $this->call(ActionSeeder::class);
    }
}
