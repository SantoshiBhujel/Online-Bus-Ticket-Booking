<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('vehicleType');
            $table->string('vehicleNo');
            $table->string('route');
            $table->integer('adultPassengers');
            $table->integer('childPassengers');
            $table->integer('specialPassengers');
            $table->string('offerCode')->nullable();
            $table->integer('price');
            $table->string('Pname');
            $table->string('Pemail');
            $table->string('pickupLocation');
            $table->string('dropLocation');
            $table->string('paymentStatus')->default('unpaid');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
