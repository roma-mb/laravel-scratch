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
//    $user = \App\Models\User::factory()->create();

//    Relationships One To One (hasOne, BelongsTo)
//    $phone = new \App\Models\Phone();
//    $phone->phone = '123-225-477';
//    $ret = $user->phone()->save($phone);

//    another way
//    $user->phone()->create([
//        'phone' => '325-444-251'
//    ]);

//    Relationships One To Many (hasMany, BelongsTo)
//    $post = new \App\Models\Post([
//        'title' => 'Title Here',
//        'body' => 'Body Here',
//        'user_id' => $user->id
//    ]);

//    $user->posts()->create([
//        'title' => 'Title Here',
//        'body' => 'Body Here',
//    ]);
//
//    $user->posts->first()->title = 'New Title';
//    $user->posts->first()->body = 'New Body';
//    $user->push();

//    Relationships Many To Many
    $user = \App\Models\User::first();
//    $roles = \App\Models\Role::all();

//    $user->roles()->attach([2]);
//    $user->roles()->sync([3,1,4]);
//    $user->roles()->syncWithoutDetaching([1,5]);

//    https://laravel.com/docs/8.x/eloquent-relationships#syncing-associations
//    $user->roles()->sync([
//        1 => [
//            'name' => $user->name
//        ]
//    ]);
//    dd($user->roles()->first()->pivot);
});
