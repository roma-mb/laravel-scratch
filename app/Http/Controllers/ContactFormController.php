<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store()
    {
        $validate = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Mail::to($validate['email'])->send(new ContactFormMail($validate));

        //        another way
        //        session()->flash('message', 'Thank you for your messge. We\'ll be in touch');
        //        return redirect('/contact');

        //        send a message in session "with()";
        return redirect('/contact')
            ->with('message', 'Thank you for your messge. We\'ll be in touch');
    }
}
