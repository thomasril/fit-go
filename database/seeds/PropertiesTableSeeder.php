<?php

use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('properties')->insert([
            'owner_id'       => 2,
            'name'           => 'Tangkas Sport Center',
            'description'    => '',
            'address'        => 'Jl. Tanjung Duren Komplek Greenville Blok Q, RT.11/RW.9, Duri Kepa, Kec. Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11510',
            'latitude'       => '-6.1885837',
            'longitude'      => '106.7706041',
            'open_hour'      => '06:00:00',
            'close_hour'     => '23:00:00',
            'status'         => 'Approved',
            'created_at'     => '2019-06-15 12:00:00',
        ]);

        DB::table('properties')->insert([
            'owner_id'       => 5,
            'name'           => 'Gor Patra',
            'description'    => '',
            'address'        => 'Jl. Patra Tomang I No.2, RT.8/RW.2, Duri Kepa, Kec. Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11510',
            'latitude'       => '-6.179057',
            'longitude'      => '106.7784522',
            'open_hour'      => '09:00:00',
            'close_hour'     => '22:00:00',
            'status'         => 'Pending',
            'created_at'     => '2019-06-15 12:00:00',
        ]);

        DB::table('properties')->insert([
            'owner_id'       => 7,
            'name'           => 'Pola Bugar Sport Center',
            'description'    => '',
            'address'        => 'Jl. Kedoya Raya No.35, RT.6/RW.3, Kedoya Sel., Kec. Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11520',
            'latitude'       => '-6.208428',
            'longitude'      => '106.7824432',
            'open_hour'      => '08:00:00',
            'close_hour'     => '23:00:00',
            'status'         => 'Pending',
            'created_at'     => '2019-06-15 12:00:00',
        ]);
    }
}
