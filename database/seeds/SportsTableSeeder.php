<?php

use Illuminate\Database\Seeder;

class SportsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sports')->insert([
            'property_id'           => 1,
            'master_sport_id'       => 1,
            'created_at'            => '2019-06-15 12:00:00'
        ]);

        DB::table('sports')->insert([
            'property_id'           => 1,
            'master_sport_id'       => 2,
            'created_at'            => '2019-06-15 12:00:00'
        ]);

        DB::table('sports')->insert([
            'property_id'           => 1,
            'master_sport_id'       => 4,
            'created_at'            => '2019-06-15 12:00:00'
        ]);

        DB::table('sports')->insert([
            'property_id'           => 1,
            'master_sport_id'       => 5,
            'created_at'            => '2019-06-15 12:00:00'
        ]);

        DB::table('sports')->insert([
            'property_id'           => 2,
            'master_sport_id'       => 2,
            'created_at'            => '2019-06-15 12:00:00'
        ]);

        DB::table('sports')->insert([
            'property_id'           => 2,
            'master_sport_id'       => 5,
            'created_at'            => '2019-06-15 12:00:00'
        ]);

        DB::table('sports')->insert([
            'property_id'           => 2,
            'master_sport_id'       => 6,
            'created_at'            => '2019-06-15 12:00:00'
        ]);

        DB::table('sports')->insert([
            'property_id'           => 2,
            'master_sport_id'       => 8,
            'created_at'            => '2019-06-15 12:00:00'
        ]);

        DB::table('sports')->insert([
            'property_id'           => 3,
            'master_sport_id'       => 9,
            'created_at'            => '2019-06-15 12:00:00'
        ]);

        DB::table('sports')->insert([
            'property_id'           => 3,
            'master_sport_id'       => 11,
            'created_at'            => '2019-06-15 12:00:00'
        ]);

        DB::table('sports')->insert([
            'property_id'           => 3,
            'master_sport_id'       => 12,
            'created_at'            => '2019-06-15 12:00:00'
        ]);
    }
}
