<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MoveInsuranceFromIncomeToClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('income', function (Blueprint $table) {
            $table->dropColumn('insurance_type');
        });
        Schema::table('clients', function (Blueprint $table) {
            $table->text('insurance')->nullable()->after('source');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('insurance');
        });
        Schema::table('income', function (Blueprint $table) {
            $table->text('insurance_type');
        });
    }
}
