<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Project;
use App\Task;

class TasksController extends Controller
{
    public function show(Customer $customer, Project $project, Task $task) {
        return view('tasks.show')->with([
            'customer' => $customer,
            'project' => $project,
            'task' => $task
        ]);
    }

    public function create(Customer $customer, Project $project) {
        return view('tasks.create')->with([
            'customer' => $customer,
            'project' => $project
        ]);
    }

    public function store(Customer $customer, Project $project) {
        $attributes = $this->validateTask();
        $project->tasks()->create($attributes);
        session()->flash('message', 'New task created!');
        return redirect('/customers/' . $customer->id . '/projects/' . $project->id);
    }

    private function validateTask() {
        return request()->validate(['name' => ['required', 'min:3', 'max:255']]);
    }
}
