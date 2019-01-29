<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name'];

    public function project() {
        $this->belongsTo(Project::class);
    }

    public function intervals() {
        return $this->hasMany(Interval::class);
    }

    public function owner() {
        return $this->belongsTo(User::class);
    }
}
