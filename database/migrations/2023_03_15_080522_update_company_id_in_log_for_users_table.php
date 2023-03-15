<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCompanyIdInLogForUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('log_for_users', function (Blueprint $table) {
            $table->foreignId('company_id')->constrained();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_for_users', function (Blueprint $table) {
            //
            $table->foreignId('company_id');
        });
    }
}
