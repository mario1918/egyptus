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
            $table->string("bio",500);
            $table->string("work_exprience",2000);
            $table->string("education");
            $table->string("languages"); //["english" =>["spoken" => fluent , "wrriten" =>]
            $table->string("activities",300)->nullable();
            $table->integer("priceRate");
            $table->string("video",200)->nullable();
            $table->string("cities");
            $table->integer("personalRate")->nullable();
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
