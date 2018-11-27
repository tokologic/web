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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::table('warehouse_goods_receives', function (Blueprint $table) {
            $table->unsignedInteger('approver_id')->change();
            $table->unsignedInteger('approved_date')->change();

        });
    }
}
