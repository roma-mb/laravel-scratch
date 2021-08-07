<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        //        php artisan db:seed CompaniesTableSeeder
        \App\Models\Company::factory()->create();
    }
}
