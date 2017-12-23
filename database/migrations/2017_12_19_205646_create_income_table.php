<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->string('monthly_income')->nullable();
            $table->string('part_time')->nullable();
            $table->string('pt_employer')->nullable();
            $table->string('full_time')->nullable();
            $table->string('ft_employer')->nullable();
            $table->text('position')->nullable();
            $table->string('income')->nullable();
            $table->boolean('unemployed')->nullable();
            $table->boolean('looking')->nullable();
            $table->text('applying')->nullable();
            $table->string('day_labor')->nullable();
            $table->string('rent')->nullable();
            $table->string('ssi')->nullable();
            $table->string('snap')->nullable();
            $table->string('tanf')->nullable();
            $table->string('child_support')->nullable();
            $table->string('utility_benefits')->nullable();
            $table->string('veteran_benefits')->nullable();
            $table->string('other_income')->nullable();
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
        Schema::dropIfExists('income');
    }
}
