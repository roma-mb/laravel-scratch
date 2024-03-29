<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\App;
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
Route::view('/welcome-laravel-8', 'welcome')->name('welcome-laravel');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/sign-in', [AuthController::class, 'signIn']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'create']);

//Route::get('contact', [ContactFormController::class, 'create']);
//Route::post('contact', [ContactFormController::class, 'store']);

// Example with name, show the full url patch in the browser
Route::get('contact', [ContactFormController::class, 'create'])->middleware('auth')->name('contact.create');
Route::post('contact', [ContactFormController::class, 'store'])->middleware('auth')->name('contact.store');

Route::view('about', 'about');

// Middleware example
//Route::view('about', 'about')->middleware('midExample');
//Route::resource('customers', CustomersController::class)->middleware('auth');

//Route::view('contact', 'contact');
Route::get('customers', [CustomersController::class, 'index'])->middleware('auth');
Route::get('customers/create', [CustomersController::class, 'create'])->middleware('auth');
Route::post('customers', [CustomersController::class, 'store'])->middleware('auth');

//other way to authorize a request, CustomerPolicy
Route::get('customers/{customer}', [CustomersController::class, 'show'])->middleware('can:view,customer');

Route::get('customers/{customer}/edit', [CustomersController::class, 'edit'])->middleware('auth');
Route::patch('customers/{customer}', [CustomersController::class, 'update'])->middleware('auth');
Route::delete('customers/{customer}', [CustomersController::class, 'destroy'])->middleware('auth');

//-r, --resource         Generate a resource controller class.
//https://laravel.com/docs/8.x/controllers#resource-controllers
//Route::resource('customers', CustomersController::class);

//Exemple to add auth in routes
//Route::resource('customers', CustomersController::class)->middleware('auth');

//SEO Friendly URLs
Route::get('profiles/{profile}', [ProfilesController::class, 'show']);
Route::get('posts/{post}-{slug}', [PostController::class, 'show']);

Route::get('/translate/{language}', function (string $language) {
    App::setLocale($language);

    return view('welcome');
})->name('translate');
