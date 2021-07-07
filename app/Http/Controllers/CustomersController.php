<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;

class CustomersController extends Controller
{
    public function __construct()
    {
//        Authenticate only or except methods
//        $this->middleware('auth')->except(['index']);
//        $this->middleware('auth')->only(['index']);
    }

    public function index()
    {
//        https://laravel.com/docs/5.0/eloquent#query-scopes
//        $activeCustomers   = Customer::active()->get();
//        $inactiveCustomers = Customer::inactive()->get();

        $customers = Customer::all();

//        return view('internals.customer', ['customer' => $customer]);
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();
        $customer  = new Customer();

        return view('customers.create', compact('companies', 'customer'));
    }

    public function store()
    {
        Customer::create($this->validateRequest());

//        return to the same route
//        return back();

        return redirect('/customers');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();

        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer)
    {
        $customer->update($this->validateRequest());
        $customer->save();

        return redirect('/customers/' . $customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('customers');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name'   => 'required|min:3',
            'email'  => 'required|email',
            'active' => 'required',
            'company_id' => 'required'
        ]);
    }
}
