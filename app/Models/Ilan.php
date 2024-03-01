<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//

class Ilan extends Model
{


    public const IS_ACTIVE_SELECT = [ 
        'yes' => 'yes',
        'no' => 'no',
    ];

    protected $table = 'ilanlar';
    protected $guarded=[];

    public function resimler(){
        return $this->hasMany(\App\Models\Resim::class, 'ilan_id');
    }

    public function durum(){
        return $this->hasOne(\App\Models\Durum::class,'id','durum_id');
    }

    public function tipler(){
        return $this->hasOne(\App\Models\Tip::class,'id','tip_id');
    }

    public function oda(){
        return $this->hasOne(\App\Models\Oda::class,'id','oda_sayisi_id');
    }

    public function mahalle(){
        return $this->hasOne(\App\Models\Mahalle::class,'id','mah_id');
    }


    public function kimden(){
        return $this->hasOne(\App\Models\Kimden::class,'id','kimden_id');
    }

    public function isitmaTur(){
        return $this->hasOne(\App\Models\IsitmaTur::class,'id','isitma_tur_id');
    }
    
    
    
    // protected $fillable = [
    //     'baslik',
    //     'tip_id',
    //     'kimden_id',
    //     'durum_id',
    //     'mah_id',
    //     'isitma_tur_id',
    //     'oda_sayisi_id',
    //     'baslik',
    //     'fiyat',
    //     'alan',
    //     'adres',
    //     'tel',
    //     'aciklama',       
    // ];
    
}
