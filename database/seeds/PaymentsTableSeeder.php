<?php

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('properties')->insert([
            'property_id'   => 1,
            'method'        => 'Cash',
            'bank'          => '',
            'created_at'    => '2019-06-15 12:00:00',
        ]);

        DB::table('properties')->insert([
            'property_id'   => 1,
            'method'        => 'Transfer',
            'bank'          => 'Go-Pay',
            'created_at'    => '2019-06-15 12:00:00',
        ]);

        DB::table('properties')->insert([
            'property_id'   => 1,
            'method'        => 'Cash',
            'bank'          => '',
            'created_at'    => '2019-06-15 12:00:00',
        ]);
    }
}
