<?php

namespace App\Console\Commands;

use App\Models\Company;
use Illuminate\Console\Command;

class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //    protected $signature = 'contact:company {name} {phone=N/A}';
    protected $signature = 'contact:company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new company.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        //        Example with arguments
        //        $company = Company::create([
        //            'name' => $this->argument('name'),
        //            'phone' => $this->argument('phone')
        //        ]);

        //        Interactively create
        $name = $this->ask('What is the company name?');
        $phone = $this->ask('What is the company\'s phone number?');

        ($this->confirm("Are you ready to insert {$name}?"))
            ? $this->createCompany($name, $phone)
            : $this->warn('No new company was added...');

        //        Another output example
//        $this->error('Error');
    }

    private function createCompany(string $name, string $phone): void
    {
        $company = Company::create(['name' => $name, 'phone' => $phone]);
        $this->info('Added ' . $company->name);
    }
}
