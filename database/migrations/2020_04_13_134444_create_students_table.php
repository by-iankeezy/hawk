<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('userID')->nullable();
            $table->bigInteger('adm');
            $table->date('date_of_birth');
            $table->string('first_name');
            $table->string('last_name');
            $table->bigInteger('classID');
            $table->integer('last_promotion');
            $table->integer('year_of_completion');
            $table->bigInteger('parentID')->nullable();
            $table->bigInteger('parent2ID')->nullable();
            $table->string('parent_relationship')->nullable();
            $table->string('parent2_relationship')->nullable();
            $table->integer('superuser')->nullable()->default(0);
            $table->longText('medical_notes')->nullable();
            $table->longText('other')->nullable();
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
        Schema::dropIfExists('students');
    }
}
