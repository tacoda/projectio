<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'project_id' => factory('App\Project')->create()->id,
        'user_id' => factory('App\User')->create()->id
    ];
});
