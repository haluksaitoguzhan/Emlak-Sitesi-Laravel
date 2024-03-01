<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for($i=0;$i<3;$i++){
            DB::table('sliders')->insert([
                'image'=>$faker->imageUrl(800, 400, 'cats', true, 'haluk'),
                'created_at'=>$faker->dateTime('now'),
                'updated_at'=>now() 
            ]);
        }
    }
}
