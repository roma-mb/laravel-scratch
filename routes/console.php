<?php

use App\Models\Company;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());

//    found 4 vulnerabilities (2 moderate, 2 high)
//  run `npm audit fix` to fix them, or `npm audit` for details

})->purpose('Display an inspiring quote');

Artisan::command('contact:company-clean', function() {
   Company::whereDoesntHave('customers')
       ->get()
       ->each(function(Company $company) {
           $company->delete();
           $this->warn('Deleted ' . $company->name);
       });
})->describe('Cleans up unused companies.');

Artisan::command('relationships:create', function() {
    $user = \App\Models\User::factory()->create();

//    $phone = new \App\Models\Phone();
//    $phone->phone = '123-225-477';
//    $ret = $user->phone()->save($phone);

//    another way
//    $user->phone()->create([
//        'phone' => '325-444-251'
//    ]);
});
