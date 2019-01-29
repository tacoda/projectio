<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'customer_id' => factory('App\Customer')->create()->id
    ];
});
