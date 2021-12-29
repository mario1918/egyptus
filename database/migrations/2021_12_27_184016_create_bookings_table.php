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
            $table->unsignedBigInteger('tourist_id')->nullable();
            $table->foreign('tourist_id')
                ->references('id')
                ->on('tourists')
                ->onUpdate('cascade');
            $table->json('trips');
            $table->integer('persons');
            $table->boolean('hotel');
            $table->float('totalPrice');
            $table->date("desiredDate");
            $table->string('notes');
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
        Schema::dropIfExists('bookings');
    }
}
