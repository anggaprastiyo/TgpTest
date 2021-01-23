<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pods = array(
            '1' => array(
              'name' => "Changi City Point",
              'address' => "5 Changi Business Park Central 1",
            ),
            '2' => array(
                'name' => "EBC Lifestyle Centre",
                'address' => "50 Tagore Lane",
            ),
            '3' => array(
                'name' => "Icon IBP",
                'address' => "3a International Business Park Road",
            ),
            '4' => array(
                'name' => "JTC LaunchPad - Ayer Rajar Crescent",
                'address' => "73a Ayer Rajah Crescent",
            ),
            '5' => array(
                'name' => "Punggol Park",
                'address' => "Hougang Avenue 10",
            )
        );  

        foreach($pods as $dt){
            DB::table('pods')->insert([
                'name' => $dt['name'],
                'address' => $dt['address'],
                'price_hour' => rand(1,10)
            ]);
        }

    }
}
