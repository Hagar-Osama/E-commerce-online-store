<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_discounts', function (Blueprint $table) {
            $table->id();
            $table->integer('percentage');
            $table->double('amount');
            $table->date('expired');
            $table->boolean('status');
            $table->timestamps();

            $table->unsignedBigInteger('product_id');

            //foreign key
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_discounts');
    }
}
