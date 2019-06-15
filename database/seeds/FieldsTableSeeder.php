<?php

use Illuminate\Database\Seeder;

class FieldsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('fields')->insert([
            'sport_id'      => 1,
            'name'          => 'Tangkas Gym',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 2,
            'name'          => 'Tangkas Gym',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 2,
            'name'          => 'Lapangan A',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 2,
            'name'          => 'Lapangan B',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 2,
            'name'          => 'Lapangan C',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 3,
            'name'          => 'Lapangan Alpha',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 3,
            'name'          => 'Lapangan Beta',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 4,
            'name'          => 'Lapangan 1',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 4,
            'name'          => 'Lapangan 2',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 5,
            'name'          => 'Lapangan A',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 5,
            'name'          => 'Lapangan B',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 5,
            'name'          => 'Lapangan C',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 5,
            'name'          => 'Lapangan D',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 6,
            'name'          => 'Lapangan Koko',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 7,
            'name'          => 'Lapangan Kecil',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 7,
            'name'          => 'Lapangan Besar',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 8,
            'name'          => 'Lapangan ABC',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 9,
            'name'          => 'Lapangan Karet',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 10,
            'name'          => 'Lapangan Indoor',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 10,
            'name'          => 'Lapangan Outdoor',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('fields')->insert([
            'sport_id'      => 11,
            'name'          => 'Bowling In The Dark',
            'created_at'    => '2019-06-15 12:00:00'
        ]);
    }
}
