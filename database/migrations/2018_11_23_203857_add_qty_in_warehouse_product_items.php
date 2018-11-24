<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQtyInWarehouseProductItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::table('warehouse_po_items', function (Blueprint $table) {
            $table->unsignedInteger('qty');
            $table->unique(['po_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::table('warehouse_po_items', function (Blueprint $table) {
//            $table->dropUnique('warehouse_po_items_po_id_product_id_unique');
            $table->dropColumn('qty');
        });
    }
}
