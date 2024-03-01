<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class KimdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Sahibinden','Emlakçıdan','İnşaat Firmasından'];
        foreach($categories as $category){
            DB::table('kimden')->insert([
                'kimden' => $category,
            ]);
        }
    }
}
