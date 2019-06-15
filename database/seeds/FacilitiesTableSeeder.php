<?php

use Illuminate\Database\Seeder;

class FacilitiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('facilities')->insert([
            'property_id'   => 1,
            'name'          => 'Toilet',
            'created_at'    => '2019-06-15 12:00:00',
        ]);

        DB::table('facilities')->insert([
            'property_id'   => 2,
            'name'          => '',
            'created_at'    => '2019-06-15 12:00:00',
        ]);

        DB::table('facilities')->insert([
            'property_id'   => 3,
            'name'          => 'Kolam Renang',
            'created_at'    => '2019-06-15 12:00:00',
        ]);

        DB::table('facilities')->insert([
            'property_id'   => 3,
            'name'          => 'Lapangan Tenis',
            'created_at'    => '2019-06-15 12:00:00',
        ]);
    }
}
