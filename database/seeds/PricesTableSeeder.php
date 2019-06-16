<?php

use Illuminate\Database\Seeder;

class PricesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('prices')->insert([
            'sport_id'      => 1,
            'name'          => 'bulan',
            'number'        => '250000',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('prices')->insert([
            'sport_id'      => 2,
            'name'          => 'jam',
            'number'        => '50000',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('prices')->insert([
            'sport_id'      => 3,
            'name'          => 'jam',
            'number'        => '150000',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('prices')->insert([
            'sport_id'      => 4,
            'name'          => 'jam',
            'number'        => '150000',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('prices')->insert([
            'sport_id'      => 5,
            'name'          => 'jam',
            'number'        => '65000',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('prices')->insert([
            'sport_id'      => 6,
            'name'          => 'jam',
            'number'        => '120000',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('prices')->insert([
            'sport_id'      => 7,
            'name'          => 'jam',
            'number'        => '50000',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('prices')->insert([
            'sport_id'      => 8,
            'name'          => 'jam',
            'number'        => '25000',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('prices')->insert([
            'sport_id'      => 8,
            'name'          => 'hari',
            'number'        => '100000',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('prices')->insert([
            'sport_id'      => 9,
            'name'          => 'jam',
            'number'        => '30000',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('prices')->insert([
            'sport_id'      => 10,
            'name'          => 'jam',
            'number'        => '180000',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('prices')->insert([
            'sport_id'      => 11,
            'name'          => 'jam',
            'number'        => '200000',
            'created_at'    => '2019-06-15 12:00:00'
        ]);
    }
}
