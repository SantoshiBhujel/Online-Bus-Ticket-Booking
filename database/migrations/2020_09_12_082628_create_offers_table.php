<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('routes_id');
            $table->string('name');
            $table->date('startDate');
            $table->date('endDate');
            $table->string('offerCode');
            $table->double('discount',6,2);
            $table->text('terms');
            $table->string('route');
            $table->integer('offerNumber')->unique();
            $table->foreign('routes_id')->references('id')->on('routes')->onDelete('cascade');
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
        Schema::dropIfExists('offers');
    }
}
