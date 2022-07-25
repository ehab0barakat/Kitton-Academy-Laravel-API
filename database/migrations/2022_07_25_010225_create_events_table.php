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
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string("title");
            $table->string("location");
            $table->boolean('isActive')->default(false);
            $table->date("date");
            $table->date("time");
            $table->string("image");
            $table->string("description");
            $table->unsignedBigInteger("teacher_id");
            $table->unsignedBigInteger("eventCat_id");

            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('eventCat_id')->references('id')->on('event_cats');


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
        Schema::dropIfExists('events');
    }
};
