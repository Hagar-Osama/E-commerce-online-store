<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('count');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_detail_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('product_detail_id')->references('id')->on('product_details')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
