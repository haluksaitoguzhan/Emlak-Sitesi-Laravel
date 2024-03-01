<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class OdaSayisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['1+0','1+1','2+1','2+0','2+1','3+1','4+1'];
        foreach($categories as $category){
            DB::table('oda_sayisi')->insert([
                'oda_sayisi' => $category,
                
            ]);
        }
    }
}
