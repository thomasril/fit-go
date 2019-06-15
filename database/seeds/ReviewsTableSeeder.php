<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('ratings')->insert([
            'customer_id'    => 3,
            'property_id'    => 1,
            'description'    => 'Good place to play sports',
            'created_at'     => '2019-06-15 12:00:00',
        ]);

        DB::table('ratings')->insert([
            'customer_id'    => 4,
            'property_id'    => 1,
            'description'    => 'Good place!',
            'created_at'     => '2019-06-15 12:00:00',
        ]);

        DB::table('ratings')->insert([
            'customer_id'    => 6,
            'property_id'    => 2,
            'description'    => 'Amazing',
            'created_at'     => '2019-06-15 12:00:00',
        ]);

        DB::table('ratings')->insert([
            'customer_id'    => 9,
            'property_id'    => 2,
            'description'    => '5.0/5.0',
            'created_at'     => '2019-06-15 12:00:00',
        ]);

        DB::table('ratings')->insert([
            'customer_id'    => 6,
            'property_id'    => 3,
            'description'    => 'Not too good!',
            'created_at'     => '2019-06-15 12:00:00',
        ]);
    }
}
