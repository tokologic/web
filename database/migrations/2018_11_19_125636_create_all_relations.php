<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });

        \Schema::table('regions', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('regions');
        });

        \Schema::table('product_images', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('asset_id')->references('id')->on('assets');

            $table->primary(['product_id', 'asset_id']);

        });

        \Schema::table('suppliers', function (Blueprint $table) {
            $table->foreign('region_id')->references('id')->on('regions');
        });

        \Schema::table('supplier_products', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('supplier_id')->references('id')->on('suppliers');

            $table->primary(['product_id', 'supplier_id']);
        });

        \Schema::table('product_prices', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
        });

        \Schema::table('warehouse_purchase_orders', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('supplier_id')->references('id')->on('users');
            $table->foreign('approver_id')->references('id')->on('users');
            $table->foreign('issuer_id')->references('id')->on('users');
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
        });

        \Schema::table('warehouse_po_items', function (Blueprint $table) {
            $table->foreign('po_id')->references('id')->on('warehouse_purchase_orders');
            $table->foreign('product_id')->references('id')->on('products');
        });

        \Schema::table('warehouses', function (Blueprint $table) {
            $table->foreign('region_id')->references('id')->on('regions');
        });

        \Schema::table('warehouse_goods_receives', function (Blueprint $table) {
            $table->foreign('po_id')->references('id')->on('warehouse_purchase_orders');
            $table->foreign('approver_id')->references('id')->on('users');
        });

        \Schema::table('warehouse_gr_items', function (Blueprint $table) {
            $table->foreign('gr_id')->references('id')->on('warehouse_goods_receives');
            $table->foreign('product_id')->references('id')->on('products');
        });

        \Schema::table('stock_items', function (Blueprint $table) {
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
            $table->foreign('product_id')->references('id')->on('products');
        });

        \Schema::table('store_purchase_orders', function (Blueprint $table) {
            $table->foreign('store_id')->references('id')->on('stores');
        });

        \Schema::table('store_po_items', function (Blueprint $table) {
            $table->foreign('po_id')->references('id')->on('store_purchase_orders');
            $table->foreign('product_price_id')->references('id')->on('product_prices');
            $table->foreign('product_id')->references('id')->on('products');
        });

        \Schema::table('stores', function (Blueprint $table) {
            $table->foreign('midwife_id')->references('id')->on('users');
            $table->foreign('region_id')->references('id')->on('regions');
        });

        \Schema::table('store_goods_receives', function (Blueprint $table) {
            $table->foreign('po_id')->references('id')->on('store_purchase_orders');
        });

        \Schema::table('store_gr_items', function (Blueprint $table) {
            $table->foreign('gr_id')->references('id')->on('store_goods_receives');
            $table->foreign('product_id')->references('id')->on('products');
        });

        \Schema::table('store_items', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
        });

        \Schema::table('sale_items', function (Blueprint $table) {
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->foreign('store_item_id')->references('id')->on('store_items');
        });

        \Schema::table('users_locations', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });

        \Schema::table('regions', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
        });

        \Schema::table('product_images', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['asset_id']);
        });

        \Schema::table('suppliers', function (Blueprint $table) {
            $table->dropForeign(['region_id']);
        });

        \Schema::table('supplier_products', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['supplier_id']);
        });

        \Schema::table('product_prices', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });

        \Schema::table('warehouse_purchase_orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['supplier_id']);
            $table->dropForeign(['approver_id']);
            $table->dropForeign(['issuer_id']);
            $table->dropForeign(['warehouse_id']);
        });

        \Schema::table('warehouse_po_items', function (Blueprint $table) {
            $table->dropForeign(['po_id']);
            $table->dropForeign(['product_id']);
        });

        \Schema::table('warehouses', function (Blueprint $table) {
            $table->dropForeign(['region_id']);
        });

        \Schema::table('warehouse_goods_receives', function (Blueprint $table) {
            $table->dropForeign(['po_id']);
            $table->dropForeign(['approver_id']);
        });

        \Schema::table('warehouse_gr_items', function (Blueprint $table) {
            $table->dropForeign(['gr_id']);
            $table->dropForeign(['product_id']);
        });

        \Schema::table('stock_items', function (Blueprint $table) {
            $table->dropForeign(['warehouse_id']);
            $table->dropForeign(['product_id']);
        });

        \Schema::table('store_purchase_orders', function (Blueprint $table) {
            $table->dropForeign(['store_id']);
        });

        \Schema::table('store_po_items', function (Blueprint $table) {
            $table->dropForeign(['po_id']);
            $table->dropForeign(['product_price_id']);
            $table->dropForeign(['product_id']);
        });

        \Schema::table('stores', function (Blueprint $table) {
            $table->dropForeign(['midwife_id']);
            $table->dropForeign(['region_id']);
        });

        \Schema::table('store_goods_receives', function (Blueprint $table) {
            $table->dropForeign(['po_id']);
        });

        \Schema::table('store_gr_items', function (Blueprint $table) {
            $table->dropForeign(['gr_id']);
            $table->dropForeign(['product_id']);
        });

        \Schema::table('store_items', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });

        \Schema::table('sale_items', function (Blueprint $table) {
            $table->dropForeign(['sale_id']);
            $table->dropForeign(['store_item_id']);
        });

        \Schema::table('users_locations', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
}
