<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_register', function (Blueprint $table) {
            $table->id();
            $table->string('schoolname');
            $table->string('uname');
            $table->string('password');
            $table->string('reg');
            $table->string('dise_code');
            $table->string('scode');
            $table->string('school_address');
            $table->integer('year');
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
        Schema::dropIfExists('school_register');
    }
}
