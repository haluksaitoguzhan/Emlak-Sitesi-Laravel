<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


//Models
use App\Models\Ilan;
use App\Models\Resim;

class IlanController extends Controller
{
    public function ilanVer()
    {
        $data['iller'] = DB::table('iller')->get();
        $data['durum'] = DB::table('durum')->get();
        $data['isitma_tur'] = DB::table('isitma_tur')->get();
        $data['tipler'] = DB::table('tipler')->get();
        $data['kimden'] = DB::table('kimden')->get();
        $data['oda_sayisi'] = DB::table('oda_sayisi')->get();
        $data['isitma_tur'] = DB::table('isitma_tur')->get();
        //$data['ilceler'] = DB::select("SELECT * FROM ilceler WHERE il_id=?",[4]);
        return view('front.advpage', $data);
    }

    public function guncelle($ilan_id)
    {

        $ilan = Ilan::with('resimler', 'durum', 'tipler', 'oda', 'mahalle', 'kimden', 'isitmaTur', 'Mahalle.ilce', 'Mahalle.ilce.il')
            ->where('id', $ilan_id)
            ->where('user_id', Auth::guard('myuser')->user()->id)
            ->first() ?? abort(403, 'Böyle bir ilan bulunamadı!');

        $data['iller'] = DB::table('iller')->get();
        $data['durum'] = DB::table('durum')->get();
        $data['isitma_tur'] = DB::table('isitma_tur')->get();
        $data['tipler'] = DB::table('tipler')->get();
        $data['kimden'] = DB::table('kimden')->get();
        $data['oda_sayisi'] = DB::table('oda_sayisi')->get();
        $data['isitma_tur'] = DB::table('isitma_tur')->get();
        $data['ilan'] = $ilan;

        //return dd($ilan);
        return view('front.update', $data);
    }

    public function ilanSil($ilan_id)
    {

        $ilan = Ilan::with('resimler')->where('id', $ilan_id)->first();
        //return $ilan;
        foreach ($ilan['resimler'] as $resim) {
            $image_path = public_path() . '/' . $resim->resim;
            unlink($image_path);
            $resim->delete();
        }

        Ilan::find($ilan->id)->delete();
        toastr()->success('İlan başarıyla silindi.', 'Silindi!');
        return redirect()->route('tumIlanlarim');
    }

    public function guncellePost(Request $request, $ilan_id)
    {
        $ilanId = $ilan_id;

        if ($request->il != 0 && $request->ilce != 0 && $request->mah != 0) {
            $request->validate(
                [
                    'baslik' => 'required',
                    'fiyat' => 'required',
                    'kimden' => 'required',
                    'durum' => 'required',
                    'tip' => 'required',
                    'alan' => 'required',
                    'il' => 'required',
                    'ilce' => 'required',
                    'mah' => 'required',
                    'adres' => 'required',
                    'tel' => 'required',
                    'aciklama' => 'required',
                ],
                [
                    'baslik.required' => 'Başlık girmelisiniz!',
                    'fiyat.required' => 'Fiyat girmelisiniz!',
                    'kimden.required' => 'Kimden kutusu boş!',
                    'durum.required' => 'Durum kutusu boş!',
                    'tip.required' => 'Tip kutusu boş!',
                    'alan.required' => 'Alan girmelisiniz!',
                    'il.required' => 'İl seçmelisiniz!',
                    'ilce.required' => 'İlçe seçmelisiniz!',
                    'mah.required' => 'Mahalle seçmelisiniz!',
                    'adres.required' => 'Adres girmelisiniz!',
                    'tel.required' => 'Telefon numarası girmelisiniz!',
                    'aciklama.required' => 'Açıklama girmelisiniz!',
                ]
            );

            $ilan = Ilan::findOrFail($ilan_id);
            $ilan->baslik = $request->baslik;
            $ilan->fiyat = $request->fiyat;
            $ilan->alan = $request->alan;
            $ilan->adres = $request->adres;
            $ilan->katSayisi = $request->kat_sayisi;
            $ilan->tel = $request->tel;
            $ilan->aciklama = $request->aciklama;
            $ilan->tip_id = $request->tip;
            $ilan->isitma_tur_id = $request->isitma_tur;
            $ilan->oda_sayisi_id = $request->oda_sayisi;
            $ilan->mah_id = $request->mah;
            $ilan->durum_id = $request->durum;
            $ilan->kimden_id = $request->kimden;
            $ilan->status = 0;
            //$ilan->updated_at = date('Y-m-d G:i:s');
            $ilan->save();

            //Resimleri Silmeye yarıyor
            if ($request->input('img')) {
                foreach ($request->input('img') as $img_id) {
                    $resim = Resim::findOrFail($img_id);
                    //return $resim_id;
                    $ilanId = $resim->ilan_id;
                    $image_path = public_path() . '/' . $resim->resim;
                    unlink($image_path);
                    $resim->delete();
                }
            }

            //Resim yüklemeye yarıyor
            if ($request->hasFile('resim')) {
                $resimler = $request->resim;
                foreach ($resimler as $resim) {
                    //$imageName = time().'.'.$resim->extension();
                    $imageName = date("YmdHis") . "." . rand(1000, 99) . '.' . $resim->getClientOriginalExtension();
                    $resim->move(public_path('images'), $imageName);

                    $r = new Resim;
                    $r->ilan_id = $ilan->id;
                    $r->resim = 'images/' . $imageName;
                    $r->save();
                }
            }
            toastr()->success('İlanınız iletildi. Teşekkür ederiz.', 'Güncelleme Başarılı');
            return redirect()->route('tumIlanlarim');
        } else {
            toastr()->error('İlanınızı alamadık bir hata oluştu!', 'Güncelleme Başarısız!');
            return redirect()->route('guncelle', $ilan_id)->withErrors('Lütfen adres bilgilerinizi eksiksiz giriniz!');
        }

        //return $request;
    }



    public function getIlce($id)
    {
        //$data['ilceler'] = DB::table('ilceler')->get(4);
        $ilceler = DB::select("SELECT * FROM ilceler WHERE il_id=?", [$id]);
        return $ilceler;
    }

    public function getMah($id)
    {
        //$data['ilceler'] = DB::table('ilceler')->get(4);
        $mahalleler = DB::select("SELECT * FROM mahalleler WHERE ilce_id=? ORDER BY mahalle", [$id]);
        return $mahalleler;
    }


    public function ilankaydet(Request $request)
    {

        $request->validate([
            'baslik' => 'required',
            'fiyat' => 'required',
            'kimden' => 'required',
            'durum' => 'required',
            'tip' => 'required',
            'alan' => 'required',
            'il' => 'required',
            'ilce' => 'required',
            'mah' => 'required',
            'adres' => 'required',
            'tel' => 'required',
            'aciklama' => 'required',
        ], [
            'baslik.required' => 'Başlık girmelisiniz!',
            'fiyat.required' => 'Fiyat girmelisiniz!',
            'kimden.required' => 'Kimden kutusu boş!',
            'durum.required' => 'Durum kutusu boş!',
            'tip.required' => 'Tip kutusu boş!',
            'alan.required' => 'Alan girmelisiniz!',
            'il.required' => 'İl seçmelisiniz!',
            'ilce.required' => 'İlçe seçmelisiniz!',
            'mah.required' => 'Mahalle seçmelisiniz!',
            'adres.required' => 'Adres girmelisiniz!',
            'tel.required' => 'Telefon numarası girmelisiniz!',
            'aciklama.required' => 'Açıklama girmelisiniz!',
        ]);

        $ilan = new Ilan;
        $ilan->baslik = $request->baslik;
        $ilan->fiyat = $request->fiyat;
        $ilan->alan = $request->alan;
        $ilan->adres = $request->adres;
        $ilan->katSayisi = $request->kat_sayisi;
        $ilan->tel = $request->tel;
        $ilan->aciklama = $request->aciklama;
        $ilan->tip_id = $request->tip;
        $ilan->isitma_tur_id = $request->isitma_tur;
        $ilan->oda_sayisi_id = $request->oda_sayisi;
        $ilan->mah_id = $request->mah;
        $ilan->durum_id = $request->durum;
        $ilan->kimden_id = $request->kimden;
        $ilan->user_id = Auth::guard('myuser')->user()->id;

        if ($request->hasFile('resim')) {
            $resimler = $request->resim;
            $ilan->save();
            foreach ($resimler as $resim) {
                //$imageName = time().'.'.$resim->extension();
                $imageName = date("YmdHis") . "." . rand(1000, 99) . '.' . $resim->getClientOriginalExtension();
                $resim->move(public_path('images'), $imageName);

                $r = new Resim;
                $r->ilan_id = $ilan->id;
                $r->resim = 'images/' . $imageName;
                $r->save();
            }
            toastr()->success('İlanınız iletildi. Teşekkür ederiz.', 'Başarılı');
            return redirect()->route('homepage');
        } else {
            toastr()->error('İlanınızı alamadık bir hata oluştu!', 'Hata');
        }
        return redirect()->route('ilanVer')->withErrors('Bir hata oluştu!');
    }

    public function ilanlarim($ilan_id)
    {
        $ilan = Ilan::with('resimler', 'durum', 'tipler', 'oda', 'mahalle', 'kimden', 'isitmaTur')
            ->where('id', $ilan_id)
            ->where('status', 1)
            ->where('user_id', '=', Auth::guard('myuser')->user()->id)
            ->first() ?? abort(403, 'Böyle bir ilan bulunamadı!');
        //->get() ?? abort(403,'Böyle bir ilan bulunamadı!');
        return view('front.single')->with('ilan', $ilan);
    }

    public function ilanlar($ilan_id)
    {
        $ilan = Ilan::with('resimler', 'durum', 'tipler', 'oda', 'mahalle', 'kimden', 'isitmaTur', 'Mahalle.ilce', 'Mahalle.ilce.il')
            ->where('id', $ilan_id)
            ->where('status', 1)
            ->where('user_id', '!=', Auth::guard('myuser')->user()->id)
            ->first() ?? abort(403, 'Böyle bir ilan bulunamadı!');
        //->get() ?? abort(403,'Böyle bir ilan bulunamadı!');
        return view('front.single')->with('ilan', $ilan);
    }

    public function tumIlanlarim()
    {
        $ilanlar = Ilan::with('resimler', 'durum', 'tipler', 'oda', 'mahalle', 'kimden', 'isitmaTur')
            ->where('status', 1)
            ->where('user_id', Auth::guard('myuser')->user()->id)
            ->orderby('created_at', 'DESC')
            ->simplePaginate(6) ?? abort(403, 'Böyle bir ilan bulunamadı!');
        return view('front.grid', compact('ilanlar'));
    }

    public function tumIlanlar()
    {
        $iller = DB::table('iller')->get();
        $tipler = DB::table('tipler')->get();
        $kimden = DB::table('kimden')->get();
        $durum = DB::table('durum')->get();

        $ilanlar = Ilan::with('resimler', 'durum', 'tipler', 'oda', 'mahalle', 'kimden', 'isitmaTur', 'Mahalle.ilce', 'Mahalle.ilce.il')
            ->where('status', 1)
            ->where('user_id', '!=', Auth::guard('myuser')->user()->id)
            ->orderby('created_at', 'DESC')
            ->simplePaginate(6);
        //->get() ?? abort(403,'Böyle bir ilan bulunamadı!');
        //return count($ilanlar);
        return view('front.grid', compact('ilanlar','iller','tipler','kimden','durum'));
    }
}
