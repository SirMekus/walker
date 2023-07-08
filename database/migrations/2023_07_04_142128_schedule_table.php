<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('service');
            $table->foreignId('driver_id')->constrained();
            $table->foreignId('vehicle_id')->constrained();
            $table->foreignId('client_id')->constrained();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('pickup_location');
            $table->string('drop_off_location');
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
        Schema::dropIfExists('schedules');
    }
};
