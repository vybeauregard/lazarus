<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->date("request_date")->nullable();
            $table->integer("client_id")->unsigned();
            $table->date("date")->nullable();
            $table->string("type")->nullable();
            $table->string("amount")->nullable();
            $table->date("due_date")->nullable();
            $table->string("remaining")->nullable();
            $table->string("total_payments")->nullable();
            $table->string("payment_count")->nullable();
            $table->date("last_payment")->nullable();
            $table->integer("closed")->nullable();
            $table->integer("budgeted")->nullable();
            $table->date("budget_date")->nullable();
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
        Schema::dropIfExists('loans');
    }
}
