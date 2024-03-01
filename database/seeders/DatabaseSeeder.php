<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SliderSeeder::class,
            IlSeeder::class,
            IlceSeeder::class,
            MahalleSeeder::class,
            IlanSeeder::class,
            AdminSeeder::class,
            DurumSeeder::class,
            IsitmaTurSeeder::class,
            OdaSayisiSeeder::class,
            TipSeeder::class,
            KimdenSeeder::class,
            ResimSeeder::class,
        ]);
    }
}
