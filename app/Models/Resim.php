<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resim extends Model
{
    protected $table = 'resimler';
    public $timestamps = false;
    protected $guarded=[];
    
    // function getImages(){
    //     return $this->hasOne('App\Models\Ilan','id','ilan_id');
    // }

}
