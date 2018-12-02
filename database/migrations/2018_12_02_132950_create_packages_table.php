<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedBigInteger('price')->default(0);
            $table->timestamps();
        });

        \Schema::table('stores', function (Blueprint $table) {
            $table->unsignedInteger('package_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn('package_id');
        });

        Schema::dropIfExists('packages');
    }
}
