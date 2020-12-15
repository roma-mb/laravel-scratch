<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return (Auth::check()) ? redirect()->route('home') : view('auth.login');
    }

    public function signIn(Request $request)
    {
         return Auth::attempt(['email' => $request->email, 'password' => $request->password])
             ? redirect()->route('home')
             : redirect()
                 ->back()
                 ->withInput()
                 ->with('message', 'Dados inválidos.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
