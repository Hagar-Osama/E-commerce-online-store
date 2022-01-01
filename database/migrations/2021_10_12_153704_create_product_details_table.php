<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->integer('stock');
            $table->timestamps();

            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('color_id');

            //foreign key
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('size_id')->references('id')->on('sizes')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('color_id')->references('id')->on('colors')->onUpdate('CASCADE')->onDelete('CASCADE');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
}
