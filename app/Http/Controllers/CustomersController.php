<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
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

        return view('customers.create', compact('companies'));
    }

    public function store()
    {
        $data = request()->validate([
            'name'   => 'required|min:3',
            'email'  => 'required|email',
            'active' => 'required',
            'company_id' => 'required'
        ]);

        Customer::create($data);

//        return to the same route
//        return back();

        return redirect('/customers');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }
}
