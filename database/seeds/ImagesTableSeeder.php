<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('images')->insert([
            'property_id'   => 1,
            'name'          => 'Tangkas_Sport_1.jpg',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('images')->insert([
            'property_id'   => 2,
            'name'          => 'Gor_Patra_1.jpg',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('images')->insert([
            'property_id'   => 3,
            'name'          => 'Pola_Bugar_1.jpg',
            'created_at'    => '2019-06-15 12:00:00'
        ]);

        DB::table('images')->insert([
            'property_id'   => 3,
            'name'          => 'Pola_Bugar_2.jpg',
            'created_at'    => '2019-06-15 12:00:00'
        ]);
    }
}
