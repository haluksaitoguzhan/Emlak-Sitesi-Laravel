<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Ilan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function __construct()
    {
        $this->middleware('isUser');

    }
    
    public function index(){
        //$sliders = DB::table('sliders')->select('image')->get();
        $sliders = Ilan::with('resimler','durum','tipler','oda','mahalle')
        ->where('status',1)
        ->where('user_id',Auth::guard('myuser')->user()->id)
        ->orderby('created_at','DESC')
        ->get()->slice(0,3);

        $ilanlar = Ilan::with('resimler','durum','tipler','oda','mahalle','Mahalle.ilce','Mahalle.ilce.il')
        ->where('status',1)
        ->where('user_id',Auth::guard('myuser')->user()->id)
        ->orderby('created_at','DESC')
        ->get()->slice(0,4);

        $sonilanlar = Ilan::with('resimler','durum','tipler','oda','mahalle')
        ->where('status',1)
        ->where('user_id','!=',Auth::guard('myuser')->user()->id)
        ->orderby('created_at','DESC')
        ->get()->slice(0,4);

        // $iller = DB::table('iller')->get();
        // $tipler = DB::table('tipler')->get();
        // $kimden = DB::table('kimden')->get();
        // $durum = DB::table('durum')->get();
        

        // return $sonilanlar;
        return view('front.homepage',compact('sliders','ilanlar','sonilanlar'));

        echo "<pre>";
        print_r($ilanlar);
        echo "</pre>";
        
    }

}
