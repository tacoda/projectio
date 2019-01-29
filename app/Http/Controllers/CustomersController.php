<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $customers = Customer::all();
        return view('customers.index')->with(['customers' => $customers]);
    }

    public function show(Customer $customer) {
        return view('customers.show')->with(['customer' => $customer]);
    }

    public function create() {
        if(! auth()->user()->isAdmin()) {
            return abort(403);
        }
        return view('customers.create');
    }

    public function store() {
        $attributes = $this->validateCustomer();
        $customer = Customer::make($attributes);
        $this->authorize('create', $customer);
        $customer->save();
        session()->flash('message', 'New customer created!');
        return redirect('/customers');
    }

    public function edit(Customer $customer) {
        $this->authorize('update', $customer);
        return view('customers.edit')->with(['customer' => $customer]);
    }

    public function update(Customer $customer) {
        $this->authorize('update', $customer);
        $attributes = $this->validateCustomer();
        $customer->update($attributes);
        session()->flash('message', 'Customer updated!');
        return redirect('/customers/' . $customer->id);
    }

    private function validateCustomer() {
        return request()->validate(['name' => ['required', 'min:3', 'max:255']]);
    }
}
