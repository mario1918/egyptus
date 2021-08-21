<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourguidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourguides', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')->onDelete("cascade");
            $table->string("profileImg");
            $table->string("languages");
            $table->string("bio",500);
            $table->string("activities",300);
            $table->integer("rate");
            $table->string("video",200)->nullable();
            $table->unsignedBigInteger('activity_id')->nullable();
            $table->foreign('activity_id')
                ->references('id')
                ->on('activities');
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
        Schema::dropIfExists('tourguides');
    }
}
