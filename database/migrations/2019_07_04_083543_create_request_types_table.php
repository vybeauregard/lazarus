<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
        });

        //allow id of zero
        DB::statement("SET SESSION sql_mode='NO_AUTO_VALUE_ON_ZERO'");

        //populate table with pre-existing types
        collect([
            "0" => "Clothing",
            "1" => "Clothing Voucher",
            "2" => "Electric",
            "3" => "Electric Disconnect",
            "4" => "Gas",
            "5" => "Gas Disconnect",
            "6" => "Water/Sewer",
            "7" => "Water/Sewer Disconnect",
            "8" => "Dental",
            "9" => "Security Deposit",
            "10" => "Rent",
            "11" => "Eviction",
            "12" => "Mortgage",
            "13" => "Glasses/Contacts",
            "14" => "Food",
            "15" => "Medical",
        ])->each(function($value, $key){
            DB::table('request_types')->insert(['id' => $key, 'type' => $value]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_types');
    }
}
