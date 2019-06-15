<?php

use Illuminate\Database\Seeder;

class MasterSportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_sports')->insert([
            'name'          => 'Gym',
            'bookable'      => false,
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('master_sports')->insert([
            'name'          => 'Bulu Tangkis',
            'bookable'      => true,
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('master_sports')->insert([
            'name'          => 'Sepak Bola',
            'bookable'      => true,
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('master_sports')->insert([
            'name'          => 'Sepak Takraw',
            'bookable'      => true,
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('master_sports')->insert([
            'name'          => 'Futsal',
            'bookable'      => true,
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('master_sports')->insert([
            'name'          => 'Basket',
            'bookable'      => true,
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('master_sports')->insert([
            'name'          => 'Volly',
            'bookable'      => true,
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('master_sports')->insert([
            'name'          => 'Tenis',
            'bookable'      => true,
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('master_sports')->insert([
            'name'          => 'Tenis Meja',
            'bookable'      => true,
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('master_sports')->insert([
            'name'          => 'Golf',
            'bookable'      => true,
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('master_sports')->insert([
            'name'          => 'Panahan',
            'bookable'      => true,
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('master_sports')->insert([
            'name'          => 'Bowling',
            'bookable'      => true,
            'created_at'    => '2019-06-15 12:00:00'
        ]);
    }
}
