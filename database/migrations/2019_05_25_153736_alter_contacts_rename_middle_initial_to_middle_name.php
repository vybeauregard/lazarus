<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterContactsRenameMiddleInitialToMiddleName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            DB::statement('ALTER TABLE contacts MODIFY COLUMN middle_initial VARCHAR(255)');
            $table->renameColumn('middle_initial', 'middle_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            DB::statement('UPDATE contacts SET middle_name=SUBSTRING(middle_name, 1, 1)');
            DB::statement('ALTER TABLE contacts MODIFY COLUMN middle_name VARCHAR(1)');
            $table->renameColumn('middle_name', 'middle_initial');
        });
    }
}
