<?php
use Faker\Generator as Faker;


$factory->define(\App\Model\Brand::class, function (Faker $faker) {
    return [
        'name' => 'Brand ' . $faker->unique()->name,
        'description' => $faker->text
    ];
});
