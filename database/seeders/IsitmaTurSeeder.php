<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class IsitmaTurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Doğalgaz','Kalorifer','Soba','Yok'];
        foreach($categories as $category){
            DB::table('isitma_tur')->insert([
                'isitma_tur' => $category,
                
            ]);
        }
    }
}
