<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Model\Brand::class, 5)->create()->each(function ($brand) {
            $brand->products()->save(factory(\App\Model\Product::class)->make());
        });
    }
}
