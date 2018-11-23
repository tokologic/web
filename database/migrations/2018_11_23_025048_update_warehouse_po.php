<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateWarehousePo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::table('warehouse_purchase_orders', function (Blueprint $table) {
            $table->unsignedInteger('approver_id')->nullable()->change();
            $table->unsignedInteger('issuer_id')->nullable()->change();
            $table->dateTime('approved_date')->nullable()->change();
            $table->dateTime('issued_date')->nullable()->change();
            $table->unsignedInteger('tax')->nullable()->change();
            $table->text('reference')->nullable()->change();
            $table->string('status')->default('new')->change();
            $table->bigInteger('amount')->default(0)->change();

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
            $table->unsignedInteger('approver_id')->change();
            $table->unsignedInteger('issuer_id')->change();
            $table->dateTime('approved_date')->change();
            $table->dateTime('issued_date')->change();
            $table->unsignedInteger('tax')->change();
            $table->text('reference')->change();
            $table->string('status')->change();
            $table->bigInteger('amount')->change();


        });
    }
}
