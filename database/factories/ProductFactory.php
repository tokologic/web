<?php
use Faker\Generator as Faker;


$factory->define(\App\Model\Product::class, function (Faker $faker) {
    return [
        'name' => 'Product ' . $faker->unique()->name,
        'description' => $faker->text,
        'barcode' => $faker->postcode,
        'unit' => 'liter'
    ];
});
