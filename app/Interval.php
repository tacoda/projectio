<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interval extends Model
{
    protected $fillable = ['start_time', 'stop_time'];

    public function task() {
        $this->belongsTo(Task::class);
    }
}
