<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Project;

class ProjectsController extends Controller
{
    public function show(Customer $customer, Project $project) {
        return view('projects.show')->with([
            'customer' => $customer,
            'project' => $project
        ]);
    }

    public function create(Customer $customer) {
        return view('projects.create')->with(['customer' => $customer]);
    }

    public function store(Customer $customer) {
        $attributes = $this->validateProject();
        $customer->projects()->create($attributes);
        session()->flash('message', 'New project created!');
        return redirect('/customers/' . $customer->id);
    }

    private function validateProject() {
        return request()->validate(['name' => ['required', 'min:3', 'max:255']]);
    }
}
