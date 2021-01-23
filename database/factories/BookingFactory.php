<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Booking;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {
    return [
        'pod_id' => $this->faker->numberBetween(1, 5),
        'booking_status_id' => $this->faker->numberBetween(1, 3),
        'customer_id' => $this->faker->numberBetween(1, 100),
        'price' => $this->faker->numberBetween(15, 50),
        'booking_date' => $this->faker->dateTimeThisMonth($max = 'now', $timezone = null),
        'booking_time' => $this->faker->time($format = 'H:i:s', $max = 'now'),
        'created_at' => $this->faker->dateTimeThisMonth($max = 'now', $timezone = null)
    ];
});
