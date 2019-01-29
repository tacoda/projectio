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
        if(! auth()->user()->isAdmin()) {
            return abort(403);
        }
        return view('projects.create')->with(['customer' => $customer]);
    }

    public function store(Customer $customer) {
        $attributes = $this->validateProject();
        $project = Project::make($attributes);
        $this->authorize('create', $project);
        $project->customer_id = $customer->id;
        $project->save();
        session()->flash('message', 'New project created!');
        return redirect('/customers/' . $customer->id);
    }

    public function edit(Customer $customer, Project $project) {
        $this->authorize('update', $project);
        return view('projects.edit')->with([
            'customer' => $customer,
            'project' => $project
        ]);
    }

    public function update(Customer $customer, Project $project) {
        $this->authorize('update', $project);
        $attributes = $this->validateProject();
        $project->update($attributes);
        session()->flash('message', 'Project updated!');
        return redirect('/customers/' . $customer->id . '/projects/' . $project->id);
    }

    private function validateProject() {
        return request()->validate(['name' => ['required', 'min:3', 'max:255']]);
    }
}
