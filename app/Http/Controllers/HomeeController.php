<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

//Models
use App\Models\Ilan;
use Illuminate\Support\Facades\Auth;

class HomeeController extends Controller
{
    public function index(){
        $sliders = DB::select("SELECT * FROM sliders ");
        $ilanlar = Ilan::with('resimler','durum','tipler','oda','mahalle','kimden','isitmaTur')
        ->where('user_id','!=',Auth::guard('myuser')->id())
        ->where('status',1)
        ->orderby('created_at','DESC')
        ->simplePaginate(6) ?? abort(403,'Böyle bir ilan bulunamadı!');

        return view('front.home',compact('sliders','ilanlar'));
    }
}
