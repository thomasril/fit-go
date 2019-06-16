<?php

use Illuminate\Database\Seeder;

class SubscriptionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('subscriptions')->insert([
            'owner_id'      => 2,
            'price'         => '0',
            'start_date'    => '2019-06-16',
            'end_date'      => '2019-07-16',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('subscriptions')->insert([
            'owner_id'      => 7,
            'price'         => '0',
            'start_date'    => '2019-06-16',
            'end_date'      => '2019-07-16',
            'created_at'    => '2019-06-15 12:00:00'
        ]);
    }
}
