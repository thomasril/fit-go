<?php

use Illuminate\Database\Seeder;

class MasterBanksTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('master_banks')->insert([
            'name'        => 'No Bank',
            'created_at'  => '2019-06-15 12:00:00',
        ]);

        DB::table('master_banks')->insert([
            'name'        => 'Go-Pay',
            'created_at'  => '2019-06-15 12:00:00',
        ]);

        DB::table('master_banks')->insert([
            'name'        => 'PT. Bank Central Asia (BCA)',
            'created_at'  => '2019-06-15 12:00:00',
        ]);
    }
}
