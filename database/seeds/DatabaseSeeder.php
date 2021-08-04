<?php

use App\Company;
use App\Employee;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Employee::truncate();

        Company::truncate();

        Employee::flushEventListeners();

        Company::flushEventListeners();

        $number_of_companies = 2;
        $number_of_employees = 100;

        factory(User::class)->create();

        factory(Company::class, $number_of_companies)->create();

        factory(Employee::class, $number_of_employees)->create();


    }
}
