<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list()
    {
        $customer = [
            'Bob',
            'John',
            'Dave'
        ];
    
    
        return view('internals.customer', ['customer' => $customer]);
    }
}
