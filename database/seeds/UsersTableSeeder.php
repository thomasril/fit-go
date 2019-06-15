<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id'           => 1,
            'name'              => 'Super Admin',
            'email'             => 'admin@gmail.com',
            'password'          => bcrypt('asdasd'),
            'phone_number'      => '+6280000000000',
            'created_at'        => '2019-06-15 12:00:00'
        ]);

        DB::table('users')->insert([
            'role_id'           => 2,
            'name'              => 'Owner',
            'email'             => 'owner@gmail.com',
            'password'          => bcrypt('asdasd'),
            'phone_number'      => '+6281234567890',
            'created_at'        => '2019-06-15 12:00:00'
        ]);

        DB::table('users')->insert([
            'role_id'           => 3,
            'name'              => 'Customer',
            'email'             => 'customer@gmail.com',
            'password'          => bcrypt('asdasd'),
            'phone_number'      => '+6280123456789',
            'created_at'        => '2019-06-15 12:00:00'
        ]);
    }
}
