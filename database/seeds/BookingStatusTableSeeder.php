<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = array(
            '1' => array(
              'status' => "Pending",
              'color' => "#FFC107",
              'icon' => "fa-clock"
            ),
            '2' => array(
                'status' => "Paid",
                'color' => "#37b955",
                'icon' => "fa-check",
            ),
            '3' => array(
                'status' => "Cancel",
                'color' => "#f64658",
                'icon' => "fa-times",
            )
        );  

        foreach($status as $ds){
            DB::table('booking_statuses')->insert([
                'status' => $ds['status'],
                'color' => $ds['color'],
                'icon' => $ds['icon'],
            ]);
        }
    }
}
