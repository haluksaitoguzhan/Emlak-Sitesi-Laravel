<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class TipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Müstakil Ev','Apartman','Arsa','Dükkan','Studyo'];
        foreach($categories as $category){
            DB::table('tipler')->insert([
                'tip' => $category,
            ]);
        }
    }
}
