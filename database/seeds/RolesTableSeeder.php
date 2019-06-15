<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            'name'          => 'Admin',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('roles')->insert([
            'name'          => 'Owner',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('roles')->insert([
            'name'          => 'Customer',
            'created_at'    => '2019-06-15 12:00:00'
        ]);
    }
}
