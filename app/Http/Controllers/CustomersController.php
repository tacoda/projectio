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

    private function validateCustomer() {
        return request()->validate(['name' => ['required', 'min:3', 'max:255']]);
    }
}
