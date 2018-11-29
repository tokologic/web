<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProductPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::table('product_prices', function (Blueprint $table) {
            $table->renameColumn('type', 'location_type');
            $table->unsignedInteger('location_id');
            $table->float('average_price');
            $table->integer('tax')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::table('product_prices', function (Blueprint $table) {
            $table->renameColumn('location_type', 'type');
            $table->dropColumn('location_id');
            $table->dropColumn('average_price');
            $table->integer('tax')->change();
        });
    }
}
