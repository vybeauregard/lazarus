<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MoveClientDetailsIntoIncome extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('apartment_name');
            $table->dropColumn('insurance_type');
            $table->dropColumn('homeless');
            $table->dropColumn('shelter');
            $table->dropColumn('private_res');
            $table->dropColumn('section_8');
            $table->dropColumn('arha');
            $table->dropColumn('other');
        });
        Schema::table('income', function (Blueprint $table) {
            $table->string('apartment_name')->after('other_income')->nullable();
            $table->text('insurance_type')->after('apartment_name')->nullable();
            $table->boolean('homeless')->after('insurance_type')->default(0);
            $table->boolean('shelter')->after('homeless')->default(0);
            $table->boolean('private_res')->after('shelter')->default(0);
            $table->boolean('section_8')->after('private_res')->default(0);
            $table->boolean('arha')->after('section_8')->default(0);
            $table->boolean('other')->after('arha')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('income', function (Blueprint $table) {
            $table->dropColumn('apartment_name');
            $table->dropColumn('insurance_type');
            $table->dropColumn('homeless');
            $table->dropColumn('shelter');
            $table->dropColumn('private_res');
            $table->dropColumn('section_8');
            $table->dropColumn('arha');
            $table->dropColumn('other');
        });
        Schema::table('clients', function (Blueprint $table) {
            $table->string('apartment_name')->after('dob')->nullable();
            $table->text('insurance_type')->after('incarceration')->nullable();
            $table->boolean('homeless')->after('insurance_type')->default(0);
            $table->boolean('shelter')->after('homeless')->default(0);
            $table->boolean('private_res')->after('shelter')->default(0);
            $table->boolean('section_8')->after('private_res')->default(0);
            $table->boolean('arha')->after('section_8')->default(0);
            $table->boolean('other')->after('arha')->default(0);
        });
    }
}
