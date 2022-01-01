<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('count');
            $table->double('item_price');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_detail_id');
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('product_detail_id')->references('id')->on('order_details')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
