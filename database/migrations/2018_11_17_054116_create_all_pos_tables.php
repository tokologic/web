<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllPosTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::dropIfExists('companies');
        \Schema::table('brands', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });

        \Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        \Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('category_id')->nullable();
            $table->string('unit')->nullable();
        });

        \Schema::create('regions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id');
            $table->string('name');
            $table->string('postal_code');
            $table->timestamps();
        });

        \Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->string('mime');
            $table->timestamps();
        });

        \Schema::create('product_images', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('asset_id');
            $table->timestamps();
        });

        \Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('region_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->timestamps();
        });

        \Schema::create('supplier_products', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('supplier_id');
            $table->timestamps();
        });

        \Schema::create('product_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->bigInteger('unit_price');
            $table->integer('tax');
            $table->string('type');
            $table->timestamps();
        });

        \Schema::create('warehouse_purchase_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('warehouse_id');
            $table->unsignedInteger('approver_id');
            $table->unsignedInteger('issuer_id');
            $table->dateTime('approved_date');
            $table->dateTime('issued_date');
            $table->date('delivery_date');
            $table->integer('tax');
//            $table->string('status');
            $table->text('description');
            $table->text('reference');
            $table->string('status');
            $table->bigInteger('amount');
            $table->timestamps();
        });

        \Schema::create('warehouse_po_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('po_id');
            $table->unsignedInteger('product_id');
            $table->integer('discount');
            $table->string('currency');
            $table->bigInteger('unit_price');
            $table->bigInteger('sub_total');
            $table->bigInteger('gross_price');
            $table->timestamps();

            $table->foreign('po_id')->references('id')->on('warehouse_purchase_orders');
            $table->foreign('product_id')->references('id')->on('products');

        });

        \Schema::create('warehouses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('region_id');
            $table->string('name');
            $table->text('address');
            $table->timestamps();

            $table->foreign('region_id')->references('id')->on('regions');

        });

        \Schema::create('warehouse_goods_receives', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('po_id');
            $table->unsignedInteger('approver_id');
            $table->unsignedInteger('approved_date');
            $table->string('status');
            $table->timestamps();

            $table->foreign('gr_id')->references('id')->on('warehouse_goods_receives');

        });

        \Schema::create('warehouse_gr_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('gr_id');
            $table->unsignedInteger('product_id');
            $table->integer('qty');
            $table->string('reference');
            $table->timestamps();

            $table->foreign('gr_id')->references('id')->on('warehouse_goods_receives');
            $table->foreign('product_id')->references('id')->on('products');

        });

        \Schema::create('stock_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('warehouse_id');
            $table->unsignedInteger('product_id');
            $table->timestamps();

            $table->foreign('warehouse_id')->references('id')->on('warehouses');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('stock_items');
        \Schema::dropIfExists('warehouse_gr_items');
        \Schema::dropIfExists('warehouse_goods_receives');
        \Schema::dropIfExists('warehouses');
        \Schema::dropIfExists('warehouse_po_items');
        \Schema::dropIfExists('warehouse_purchase_orders');
        \Schema::dropIfExists('product_prices');
        \Schema::dropIfExists('supplier_products');
        \Schema::dropIfExists('suppliers');
        \Schema::dropIfExists('product_images');
        \Schema::dropIfExists('assets');
        \Schema::dropIfExists('regions');
        \Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('category_id');
            $table->dropColumn('unit');
        });
        \Schema::dropIfExists('categories');
        \Schema::table('brands', function (Blueprint $table) {
            $table->integer('company_id')->nullable();
        });
        \Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }
}
