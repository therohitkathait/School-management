<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table->id();
        $table->string('place_name'); // Column for place_name (change data type if needed)
        $table->decimal('fees', 10, 2); // Column for fees (assuming decimal values)
        $table->unsignedBigInteger('user_id'); // Column for user_id

        // Define foreign key constraint
        $table->foreign('user_id')->references('id')->on('school_registers')->onDelete('cascade');

        $table->timestamps();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transport_fees');
    }
}
