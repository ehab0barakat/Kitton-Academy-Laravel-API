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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("price");
            $table->boolean('isActive')->default(false);
            $table->unsignedBigInteger("quantity");
            $table->string("image");
            $table->string("description");
            $table->unsignedBigInteger("cat_id");

            $table->foreign('cat_id')->references('id')->on('product_cats');


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
        Schema::dropIfExists('products');
    }
};
