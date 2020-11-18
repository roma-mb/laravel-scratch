<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list()
    {

    $customer = Customer::all();

        return view('internals.customer', ['customer' => $customer]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|min:3'
        ]);

        $customer       = new Customer();
        $customer->name = request('name');
        $customer->save();

        return back();
    }
}
