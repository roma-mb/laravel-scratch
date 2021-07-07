<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home')->name('home');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/sign-in', [AuthController::class, 'signIn']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'create']);

//Route::get('contact', [ContactFormController::class, 'create']);
//Route::post('contact', [ContactFormController::class, 'store']);

// Example with name, show the full url patch in the browser
Route::get('contact', [ContactFormController::class, 'create'])->name('contact.create');
Route::post('contact', [ContactFormController::class, 'store'])->name('contact.store');

Route::view('about', 'about');

// Middleware example
//Route::view('about', 'about')->middleware('midExample');
//Route::resource('customers', CustomersController::class)->middleware('auth');

//Route::view('contact', 'contact');
//Route::get('customers', [CustomersController::class, 'index']);
//Route::get('customers/create', [CustomersController::class, 'create']);
//Route::post('customers', [CustomersController::class, 'store']);
//Route::get('customers/{customer}', [CustomersController::class, 'show']);
//Route::get('customers/{customer}/edit', [CustomersController::class, 'edit']);
//Route::patch('customers/{customer}', [CustomersController::class, 'update']);
//Route::delete('customers/{customer}', [CustomersController::class, 'destroy']);

//-r, --resource         Generate a resource controller class.
//https://laravel.com/docs/8.x/controllers#resource-controllers
Route::resource('customers', CustomersController::class);

//Exemple to add auth in routes
//Route::resource('customers', CustomersController::class)->middleware('auth');
