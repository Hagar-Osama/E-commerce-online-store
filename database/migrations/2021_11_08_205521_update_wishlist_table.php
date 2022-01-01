<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWishlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wish_lists', function (Blueprint $table) {
            $table->dropForeign('wish_lists_product_id_foreign');
            $table->dropColumn('product_id');
            $table->unsignedBigInteger('product_detail_id');
            $table->foreign('product_detail_id')->references('id')->on('product_details')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wish_lists', function (Blueprint $table) {
            //
        });
    }
}
