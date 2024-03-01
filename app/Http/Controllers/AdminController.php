<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Models
use App\Models\Ilan;

class AdminController extends Controller
{
    public function index(){
        return view('back.admin');
    }

    public function giris(){
        return view('back.admingiris');
    }

    public function girisPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' =>'Email girmelisiniz!',
            'password.required' =>'Şifre girmelisiniz!'
        ]
        );
        
        $check = $request-> only(['email' , 'password']);
        if(Auth::guard('admin')->attempt($check)){
            //return Auth::guard('admin')->user();
            return redirect()->route('admin_panel')->with('admin',Auth::guard('admin')->user());
        }else{
            return redirect()->route('admin_giris')->withErrors('Email adresi veya şifre hatalı!');
        }

        // $query = DB::select("SELECT * FROM admins");
        
        // foreach($query as $q) {
        //    if($q->email == $request->email && Hash::check($request->password, $q->password) == true){
        //     return redirect()->route('admin_panel');
        //     //return View::make('back.admingiris')->with(array('q' => $q));
        //    }
        // }
        // return redirect()->route('admin_giris')->withErrors('Email adresi veya şifre hatalı!');
    }

    public function cikis(){
        //return response('sg');
        Auth::guard('admin')->logout();
        return redirect()->route('admin_giris');
    }

    public function bekleyenIlanlar(){
        $ilanlar = Ilan::with('resimler','durum','tipler','oda','mahalle','kimden','isitmaTur')
        ->where('status',0)->get();

        return view('back.ilanlar',compact('ilanlar'));
    }

    public function onaylanmisIlanlar(){
        $ilanlar = Ilan::with('resimler','durum','tipler','oda','mahalle','kimden','isitmaTur')
        ->where('status',1)->get();

        return view('back.ilanlar',compact('ilanlar'));
    }

    public function ilanDetay($ilan_id){
        $ilan = Ilan::with('resimler','durum','tipler','oda','mahalle','kimden','isitmaTur')
        ->where('id',$ilan_id)->first();
        //return $ilan;
        return view('back.ilandetay',compact('ilan'));
    }

    public function ilanOnayla($ilan_id){
        //return $ilan_id;
        $ilan = Ilan::where('id',$ilan_id)->update(['status' => 1]);
        toastr()->success('İlan başarıyla onaylandı.', 'Onaylandı');
        return redirect()->route('admin_onay_bekleyenler');
    }

    public function ilanSil($ilan_id){

        //return $ilan_id;
        $ilan = Ilan::with('resimler')->where('id',$ilan_id)->first();
        $ilan_status = $ilan->status;
        
        foreach($ilan['resimler'] as $resim){
            $image_path = public_path().'/'.$resim->resim;
            unlink($image_path);
            $resim->delete();
        }

        Ilan::find($ilan->id)->delete();
        toastr()->success('İlan başarıyla silindi.', 'Silindi');
        
        if($ilan_status == 1){
            return redirect()->route('admin_onaylanmis_ilanlar');
        }else{
            return redirect()->route('admin_onay_bekleyenler');
        }
    }

}
