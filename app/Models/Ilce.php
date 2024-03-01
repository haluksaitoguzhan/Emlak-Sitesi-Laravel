<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ilce extends Model
{
    protected $table = 'ilceler';
    protected $guarded=[];
    
    public function il(){
        return $this->hasOne(\App\Models\Il::class,'id','il_id');
    }
}
