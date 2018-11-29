<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStockItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::table('stock_items', function (Blueprint $table) {
            $table->float('average_price')->change();
            $table->float('whole_sale_price')->nullable()->change();

            $table->unsignedInteger('min')->nullable()->change();
            $table->unsignedInteger('max')->nullable()->change();

            $table->boolean('on_order')->default(false)->change();
            $table->string('bin_location')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::table('stock_items', function (Blueprint $table) {
            $table->unsignedInteger('min')->change();
            $table->unsignedBigInteger('average_price')->change();
            $table->unsignedBigInteger('whole_sale_price')->change();
            $table->unsignedInteger('max')->change();
            $table->boolean('on_order')->change();


        });
    }
}
