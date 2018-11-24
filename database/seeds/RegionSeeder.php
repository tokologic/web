<?php

use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Model\Region::class, 500)->create()->each(function ($brand) {
            $brand->suppliers()->save(factory(\App\Model\Supplier::class)->make());
            $brand->warehouses()->save(factory(\App\Model\Warehouse::class)->make());
        });
    }
}
