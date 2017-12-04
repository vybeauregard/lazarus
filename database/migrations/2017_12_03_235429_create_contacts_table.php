<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->default('');
            $table->string('last_name')->default('');
            $table->string('middle_initial')->default('');
            $table->string('address1')->default('');
            $table->string('address2')->default('');
            $table->string('city')->default('');
            $table->string('state', 2)->default('');
            $table->string('zip', 10)->default('');
            $table->string('phone', 10)->default('');
            $table->string('email')->default('');
            $table->morphs('contactable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
