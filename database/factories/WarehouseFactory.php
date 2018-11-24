<?php
use Faker\Generator as Faker;


$factory->define(\App\Model\Warehouse::class, function (Faker $faker) {
    return [
        'name' => 'WH ' . $faker->unique()->name,
        'address' => $faker->address
    ];
});
