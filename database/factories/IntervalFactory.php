<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Interval::class, function (Faker $faker) {
    return [
        'task_id' => factory('App\Task')->create()->id,
        'start_time' => Carbon::now(),
        'stop_time' => Carbon::now()->addMinutes(30)
    ];
});
