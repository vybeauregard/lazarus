<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable();
            $table->date('dob')->nullable();
            $table->string('apartment_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('birth_country')->nullable();
            $table->string('veteran_status')->nullable();
            $table->text('incarceration')->nullable();
            $table->text('insurance_type')->nullable();
            $table->boolean('homeless')->default(0);
            $table->boolean('shelter')->default(0);
            $table->boolean('private_res')->default(0);
            $table->boolean('section_8')->default(0);
            $table->boolean('arha')->default(0);
            $table->boolean('other')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
