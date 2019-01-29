<?php

use Illuminate\Database\Seeder;

class IntervalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Interval', 5)->create();
    }
}
