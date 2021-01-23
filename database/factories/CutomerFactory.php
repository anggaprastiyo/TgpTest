<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'user_name' => $this->faker->unique()->safeEmail,
        'phone' => $this->faker->e164PhoneNumber,
        'name' => $this->faker->name,
        'gender' => $this->faker->randomElement(['male', 'female']),
        'created_at' => $this->faker->dateTimeThisMonth($max = 'now', $timezone = null)
    ];
});
