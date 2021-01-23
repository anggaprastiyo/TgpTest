<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PodsTableSeeder::class);
        $this->call(BookingStatusTableSeeder::class);
        factory(App\Customer::class, 100)->create();
        factory(App\Booking::class, 5000)->create();
    }
}
