<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourguideTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
//    public function up()
//    {
//        Schema::create('tourguide_trips', function (Blueprint $table) {
//            $table->id();
//            $table->unsignedBigInteger('tourguide_id')->nullable();
//            $table->foreign('tourguide_id')
//                ->references('id')
//                ->on('tourguides')
//                ->onUpdate('cascade');
//            $table->unsignedBigInteger('trip_id')->nullable();
//            $table->foreign('trip_id')
//                ->references('id')
//                ->on('trips')
//                ->onUpdate('cascade');
//            $table->float('fare'); //per person
//            $table->timestamps();
//        });
//    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tourguide_trips');
    }
}
