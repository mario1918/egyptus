<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string("review");
            $table->unsignedBigInteger('tourguide_id')->nullable();
            $table->foreign('tourguide_id')
                ->references('id')
                ->on('tourguides')
                ->onUpdate('cascade');
                $table->unsignedBigInteger('reviewer')->nullable();
            $table->foreign('reviewer')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')->onDelete("cascade");
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
        Schema::dropIfExists('reviews');
    }
}
