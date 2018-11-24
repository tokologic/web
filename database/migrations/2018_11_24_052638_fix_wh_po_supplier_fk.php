<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixWhPoSupplierFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::table('warehouse_purchase_orders', function (Blueprint $table) {
            $table->dropForeign('warehouse_purchase_orders_supplier_id_foreign');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::table('warehouse_purchase_orders', function (Blueprint $table) {
            $table->dropForeign('warehouse_purchase_orders_supplier_id_foreign');
            $table->foreign('supplier_id')->references('id')->on('users');
        });
    }
}
