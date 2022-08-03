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
        Schema::create('user_class_content', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('normal_users')->onDelete('cascade');

            $table->unsignedBigInteger("video_id");
            $table->foreign('video_id')->references('id')->on('class_content')->onDelete('cascade');

            $table->unsignedBigInteger("class_id");
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');

            $table->unsignedBigInteger("seen")->default(0);

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
        Schema::dropIfExists('user_class_content');
    }
};
