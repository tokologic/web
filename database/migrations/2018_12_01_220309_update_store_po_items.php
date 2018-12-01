<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStorePoItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('store_po_items', function (Blueprint $table) {
            $table->dropForeign(['product_price_id']);
            $table->dropColumn('product_price_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('store_po_items', function (Blueprint $table) {
            $table->unsignedInteger('product_price_id');
            $table->foreign('product_price_id')->references('id')->on('product_prices');
        });
    }
}
