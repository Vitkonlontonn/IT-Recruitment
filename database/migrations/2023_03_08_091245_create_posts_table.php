<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('company_id')->constrained();
            $table->string('job_title');
            $table->string('district');
            $table->string('city');
            $table->boolean('remote');
            $table->boolean('part_time');
            $table->integer('min_salary');
            $table->integer('max_salary');
            $table->integer('currency_salary')->default(1);
            $table->text('requirement')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('number_applicants');
            $table->integer('status')->default(0);
            $table->string('slug');

            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
