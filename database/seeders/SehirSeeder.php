<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SehirSeeder extends Seeder
{
    public function run()
    {
        $cities = [
            'Adana' ,
            'Adıyaman' ,
            'Afyonkarahisar' ,
            'Ağrı' ,
            'Aksaray' ,
            'Amasya' ,
            'Ankara' ,
            'Antalya' ,
            'Ardahan' ,
            'Artvin' ,
            'Aydın' ,
            'Balıkesir' ,
            'Bartın' ,
            'Batman' ,
            'Bayburt' ,
            'Bilecik' ,
            'Bingöl' ,
            'Bitlis' ,
            'Bolu' ,
            'Burdur' ,
            'Bursa' ,
            'Çanakkale' ,
            'Çankırı' ,
            'Çorum' ,
            'Denizli' ,
            'Diyarbakır' ,
            'Düzce' ,
            'Edirne' ,
            'Elazığ' ,
            'Erzincan' ,
            'Erzurum' ,
            'Eskişehir' ,
            'Gaziantep' ,
            'Giresun' ,
            'Gümüşhane' ,
            'Hakkari' ,
            'Hatay' ,
            'Iğdır' ,
            'Isparta' ,
            'İstanbul' ,
            'İzmir' ,
            'Kahramanmaraş' ,
            'Karabük' ,
            'Karaman' ,
            'Kars' ,
            'Kastamonu' ,
            'Kayseri' ,
            'Kırıkkale' ,
            'Kırklareli' ,
            'Kırşehir' ,
            'Kilis' ,
            'Kocaeli' ,
            'Konya' ,
            'Kütahya' ,
            'Malatya' ,
            'Manisa' ,
            'Mardin' ,
            'Mersin' ,
            'Muğla' ,
            'Muş' ,
            'Nevşehir' ,
            'Niğde' ,
            'Ordu' ,
            'Osmaniye' ,
            'Rize' ,
            'Sakarya' ,
            'Samsun' ,
            'Siirt' ,
            'Sinop' ,
            'Sivas' ,
            'Şanlıurfa' ,
            'Şırnak' ,
            'Tekirdağ' ,
            'Tokat' ,
            'Trabzon' ,
            'Tunceli' ,
            'Uşak' ,
            'Van' ,
            'Yalova' ,
            'Yozgat' ,
            'Zonguldak' 
        ];

            foreach ($cities as $city){
                DB::table('sehirler')->insert([
                    'sehir' => $city,
                    'slug' => \Str::slug($city)
                ]);
            }

    }
}
