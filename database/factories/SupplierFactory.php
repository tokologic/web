<?php
use Faker\Generator as Faker;


$factory->define(\App\Model\Supplier::class, function (Faker $faker) {
    return [
        'name' => 'PT. ' . $faker->unique()->name,
        'email' => $faker->unique()->email,
        'phone' => $faker->unique()->phoneNumber,
        'address' => $faker->address
    ];
});
