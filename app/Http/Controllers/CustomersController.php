<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $activeCustomers   = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();

//        return view('internals.customer', ['customer' => $customer]);
        return view('customers.index', compact('activeCustomers', 'inactiveCustomers'));
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
}
