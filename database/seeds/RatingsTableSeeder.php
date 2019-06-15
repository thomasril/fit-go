<?php

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('ratings')->insert([
            'customer_id'    => 3,
            'property_id'    => 1,
            'number'         => 5,
            'created_at'     => '2019-06-15 12:00:00',
        ]);

        DB::table('ratings')->insert([
            'customer_id'    => 4,
            'property_id'    => 1,
            'number'         => 4,
            'created_at'     => '2019-06-15 12:00:00',
        ]);

        DB::table('ratings')->insert([
            'customer_id'    => 6,
            'property_id'    => 2,
            'number'         => 5,
            'created_at'     => '2019-06-15 12:00:00',
        ]);

        DB::table('ratings')->insert([
            'customer_id'    => 9,
            'property_id'    => 2,
            'number'         => 5,
            'created_at'     => '2019-06-15 12:00:00',
        ]);

        DB::table('ratings')->insert([
            'customer_id'    => 6,
            'property_id'    => 3,
            'number'         => 3,
            'created_at'     => '2019-06-15 12:00:00',
        ]);
    }
}
