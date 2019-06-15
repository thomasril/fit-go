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
            'property_id'   => 1,
            'name'          => 'Kamar Ganti',
            'created_at'    => '2019-06-15 12:00:00',
        ]);

        DB::table('facilities')->insert([
            'property_id'   => 1,
            'name'          => 'Tempat Sauna',
            'created_at'    => '2019-06-15 12:00:00',
        ]);

        DB::table('facilities')->insert([
            'property_id'   => 1,
            'name'          => 'Tempat Snack',
            'created_at'    => '2019-06-15 12:00:00',
        ]);

        DB::table('facilities')->insert([
            'property_id'   => 2,
            'name'          => 'Toilet',
            'created_at'    => '2019-06-15 12:00:00',
        ]);

        DB::table('facilities')->insert([
            'property_id'   => 2,
            'name'          => 'Kamar Ganti',
            'created_at'    => '2019-06-15 12:00:00',
        ]);

        DB::table('facilities')->insert([
            'property_id'   => 2,
            'name'          => 'Tempat Snack',
            'created_at'    => '2019-06-15 12:00:00',
        ]);

        DB::table('facilities')->insert([
            'property_id'   => 3,
            'name'          => 'Toilet',
            'created_at'    => '2019-06-15 12:00:00',
        ]);

    }
}
