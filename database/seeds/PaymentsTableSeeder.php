<?php

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('payments')->insert([
            'property_id'   => 1,
            'bank_id'       => 1,
            'account_number'=> null,
            'account_name'  => null,
            'method'        => 'Cash',
            'created_at'    => '2019-06-15 12:00:00',
        ]);

        DB::table('payments')->insert([
            'property_id'   => 2,
            'bank_id'       => 1,
            'account_number'=> null,
            'account_name'  => null,
            'method'        => 'Cash',
            'created_at'    => '2019-06-15 12:00:00',
        ]);

        DB::table('payments')->insert([
            'property_id'   => 2,
            'bank_id'       => 2,
            'account_number'=> '0812539539',
            'account_name'  => 'Mario Viegash',
            'method'        => 'Transfer',
            'created_at'    => '2019-06-15 12:00:00',
        ]);

        DB::table('payments')->insert([
            'property_id'   => 3,
            'bank_id'       => 1,
            'account_number'=> null,
            'account_name'  => null,
            'method'        => 'Cash',
            'created_at'    => '2019-06-15 12:00:00',
        ]);

        DB::table('payments')->insert([
            'property_id'   => 2,
            'bank_id'       => 3,
            'account_number'=> '5279591539',
            'account_name'  => 'Pola Bugar',
            'method'        => 'Transfer',
            'created_at'    => '2019-06-15 12:00:00',
        ]);
    }
}
