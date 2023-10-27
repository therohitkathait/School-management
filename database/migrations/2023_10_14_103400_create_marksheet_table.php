<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksheetTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('marksheet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to link with users table
            $table->integer('student_id');
            $table->string('subject');
            $table->integer('obtained_marks');
            $table->integer('half_yearly_marks');
            $table->integer('project_marks');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('school_registers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marksheet');
    }
}
