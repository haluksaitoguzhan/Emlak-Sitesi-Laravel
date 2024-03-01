<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{

    public function run()
    {
        DB::table('admins')->insert([
            'name'=>'Haluk Sait Oğuzhan',
            'email'=>'haluksaitoguzhan04@gmail.com',
            'password' => Hash::make('aaaaaa'),
        ]);
    }
}
