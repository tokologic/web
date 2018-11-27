<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateWarehouseGr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::table('warehouse_goods_receives', function (Blueprint $table) {
            $table->unsignedInteger('approver_id')->nullable()->change();
            $table->dateTime('approved_date')->nullable()->change();

        });

        \Schema::table('warehouse_gr_items', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');

            $table->unsignedInteger('po_item_id');
            $table->foreign('po_item_id')->references('id')->on('warehouse_po_items');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::table('warehouse_gr_items', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');

            $table->dropForeign(['po_item_id']);
            $table->dropColumn('po_item_id');
        });

        \Schema::table('warehouse_goods_receives', function (Blueprint $table) {
            $table->unsignedInteger('approver_id')->change();
            $table->unsignedInteger('approved_date')->change();

        });
    }
}
