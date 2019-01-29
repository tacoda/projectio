<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Project;
use App\Task;

class IntervalsController extends Controller
{
    public function create(Customer $customer, Project $project, Task $task) {
        return view('intervals.create')->with([
            'customer' => $customer,
            'project' => $project,
            'task' => $task
        ]);
    }

    public function store(Customer $customer, Project $project, Task $task) {
        $attributes = request()->toArray();
        $task->intervals()->create($attributes);
        session()->flash('message', 'New interval created!');
        return redirect('/customers/' . $customer->id . '/projects/' . $project->id . '/tasks/' . $task->id);
    }

//    private function validateInterval() {
//        return request()->validate([
//            'start_time' => ['date_format:Y-m-d h:i A'],
//            'stop_time' => ['date_format:Y-m-d h:i A']
//        ]);
//    }
}
