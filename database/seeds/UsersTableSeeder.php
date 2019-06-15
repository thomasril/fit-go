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
            'name'              => 'Wayne Long',
            'email'             => 'waynelong@gmail.com',
            'password'          => bcrypt('test123'),
            'phone_number'      => '(891)-149-1298',
            'created_at'        => '2019-06-15 12:00:00'
        ]);

        DB::table('users')->insert([
            'role_id'           => 3,
            'name'              => 'Gail Snyder',
            'email'             => 'gail.snyder96@gmail.com',
            'password'          => bcrypt('test123'),
            'phone_number'      => '(556)-153-6903',
            'created_at'        => '2019-06-15 12:00:00'
        ]);

        // Customer
        DB::table('users')->insert([
            'role_id'           => 3,
            'name'              => 'Thomas Asril',
            'email'             => 'thomas@gmail.com',
            'password'          => bcrypt('thomas'),
            'phone_number'      => '+6285885922105',
            'created_at'        => '2019-06-15 12:00:00'
        ]);

        DB::table('users')->insert([
            'role_id'           => 2,
            'name'              => 'Mario Viegash',
            'email'             => 'mario@gmail.com',
            'password'          => bcrypt('mario'),
            'phone_number'      => '+6280123456789',
            'created_at'        => '2019-06-15 12:00:00'
        ]);

        DB::table('users')->insert([
            'role_id'           => 3,
            'name'              => 'Jordan Leonardi',
            'email'             => 'jordan@gmail.com',
            'password'          => bcrypt('jordan'),
            'phone_number'      => '+6280123456789',
            'created_at'        => '2019-06-15 12:00:00'
        ]);

        DB::table('users')->insert([
            'role_id'           => 2,
            'name'              => 'Nicholas Jackson',
            'email'             => 'nicholas.jackson25@gmail.com',
            'password'          => bcrypt('test123'),
            'phone_number'      => '(021) 5807086',
            'created_at'        => '2019-06-15 12:00:00'
        ]);

        DB::table('users')->insert([
            'role_id'           => 3,
            'name'              => 'Brianna Simmons',
            'email'             => 'brianna.simmons60@gmail.com',
            'password'          => bcrypt('test123'),
            'phone_number'      => '(516)-543-1266',
            'created_at'        => '2019-06-15 12:00:00'
        ]);

        DB::table('users')->insert([
            'role_id'           => 3,
            'name'              => 'Brandon Scott',
            'email'             => 'brandon.scott66@gmail.com',
            'password'          => bcrypt('test123'),
            'phone_number'      => '(545)-147-7230',
            'created_at'        => '2019-06-15 12:00:00'
        ]);

        DB::table('users')->insert([
            'role_id'           => 3,
            'name'              => 'Dustin Russell',
            'email'             => 'dustin.russell20@gmail.com',
            'password'          => bcrypt('test123'),
            'phone_number'      => '(979)-338-4472',
            'created_at'        => '2019-06-15 12:00:00'
        ]);

        DB::table('users')->insert([
            'role_id'           => 3,
            'name'              => 'Lynn Bishop',
            'email'             => 'lynn.bishop30@gmail.com',
            'password'          => bcrypt('test123'),
            'phone_number'      => '(155)-582-9087',
            'created_at'        => '2019-06-15 12:00:00'
        ]);
    }
}
