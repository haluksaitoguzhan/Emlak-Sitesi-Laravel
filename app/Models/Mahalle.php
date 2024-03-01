<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahalle extends Model
{
    protected $table = 'mahalleler';
    protected $guarded=[];

    public function ilce(){
        return $this->hasOne(\App\Models\Ilce::class,'id','ilce_id');
    }
}
