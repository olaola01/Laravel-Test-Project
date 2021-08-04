<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\Employee;
//use App\Model;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        //
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'company_id' => Company::all()->random()->id,
    ];
});
