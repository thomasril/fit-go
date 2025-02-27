<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            MasterSportsTableSeeder::class,
            MasterBanksTableSeeder::class,
            PropertiesTableSeeder::class,
            SubscriptionsTableSeeder::class,
            ImagesTableSeeder::class,
            SportsTableSeeder::class,
            FieldsTableSeeder::class,
            PaymentsTableSeeder::class,
            PricesTableSeeder::class,
            RatingsTableSeeder::class,
            ReviewsTableSeeder::class,
            FacilitiesTableSeeder::class
        ]);
    }
}
