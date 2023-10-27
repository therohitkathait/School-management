<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('number')->nullable();
            $table->string('address')->nullable();
            $table->string('designation')->nullable();
            $table->decimal('sallery', 10, 2)->nullable();
            $table->string('gender')->nullable();
            $table->string('image_path')->nullable();
            $table->foreignId('user_id')->constrained(); // Assuming 'user_id' is the foreign key for the logged-in user
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
        Schema::dropIfExists('staff');
    }
}
