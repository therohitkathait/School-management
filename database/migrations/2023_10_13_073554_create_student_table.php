<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->date('dob');
            $table->string('number');
            $table->string('class_name');
            $table->integer('roll_number')->nullable();
            $table->bigInteger('aadhar_number');
            $table->bigInteger('samagra_id');
            $table->string('address');
            $table->string('gender');
            $table->string('category');
            $table->boolean('rte')->default(false);
            $table->boolean('transport_service')->default(false);
            $table->string('pickup_drop_point')->nullable();
            $table->string('image_path')->nullable(); // New column for image path
            $table->integer('year');
            $table->unsignedBigInteger('user_id'); // Column for user_id

            // Define foreign key constraint
            $table->foreign('user_id')->references('id')->on('school_registers')->onDelete('cascade');
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
        Schema::dropIfExists('student');
    }
}
