<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{

    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('address');
            $table->string('address2');
            $table->string('city');
            $table->string('district');
            $table->string('country');
            $table->string('zipcode');
            $table->string('phone');
            $table->string('email');
            $table->string('logo')->nullable();

        });
    }


    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
