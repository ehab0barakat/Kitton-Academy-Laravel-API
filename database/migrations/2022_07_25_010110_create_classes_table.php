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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("price");
            $table->boolean('isActive')->default(false);
            $table->string("duration");
            $table->date("date");
            $table->unsignedBigInteger("targetAge");
            $table->unsignedBigInteger("size");
            $table->date("time");
            $table->string("image");
            $table->string("description");
            $table->unsignedBigInteger("teacher_id");

            $table->foreign('teacher_id')->references('id')->on('teachers');

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
        Schema::dropIfExists('classes');
    }
};
