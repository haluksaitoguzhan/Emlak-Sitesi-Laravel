<?php

namespace App\Http\Controllers;

use App\Models\Ilan;
use App\Models\Mahalle;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        /*
        $stringHelper = new StringHelper();

        $offDayType = $request->offDayType;
        $rangeDatepicker = $request->date_range;
        $educationStatus = $request->education_status;
        $min_age = $request->min_age;
        $max_age = $request->max_age;
        $offDays = null;

        if(is_null($offDayType) && is_null($rangeDatepicker) && is_null($educationStatus) && is_null($min_age) && is_null($max_age)){
            return  redirect()->back()->with('error', 'Rapor oluşturmak için en az bir alan seçmelisiniz!');
        }

        if(is_null($offDayType) && is_null($rangeDatepicker) && is_null($educationStatus) && is_null($max_age) && !is_null($min_age)){
            $offDays = DB::table('users')
            ->where(DB::raw('TIMESTAMPDIFF(YEAR,users.birth_date,CURDATE())'),'>=' , $min_age )
            ->select('users.id','users.birth_date', 'users.name', 'users.surname')
            ->get();

        }
        if(is_null($offDayType) && is_null($rangeDatepicker) && is_null($educationStatus) && is_null($min_age) && !is_null($max_age)){
            $offDays = DB::table('users')
            ->where(DB::raw('TIMESTAMPDIFF(YEAR,users.birth_date,CURDATE())'),'<=' , $max_age )
            ->select('users.id','users.birth_date', 'users.name', 'users.surname')
            ->get();
        }

        if ($offDayType == 'all_off') {
            $offDays = DB::table('users')
                ->join('off_days', 'users.id', '=', 'off_days.user_id')
                ->select('users.id', 'users.name', 'users.surname', 'off_days.date_of_start', 'off_days.type', 'off_days.number_of_days', 'off_days.start_date', 'off_days.due_date')
                ->get();

            if ($rangeDatepicker) {
                $offDays = $this->getDateRange($stringHelper, $rangeDatepicker);
            }
        }

        if ($offDayType != null && is_numeric($offDayType)) {
            $offDays = OffDay::where('type', $offDayType)->get();
            if ($rangeDatepicker) {
                $offDays = $this->getDateRange($stringHelper, $rangeDatepicker, $offDayType);
            }
        }

        if ($educationStatus != null && is_numeric($educationStatus)) {
            // TODO
            $offDays = DB::table('users')
                ->join('off_days', 'users.id', '=', 'off_days.user_id')
                ->whereDate('off_days.start_date', '>=', Carbon::parse('2022-11-11')->format('Y-m-d'))
                ->whereDate('off_days.due_date', '<=', Carbon::parse('2022-11-18')->format('Y-m-d'))
                ->join('education', 'users.id', '=', 'education.user_id')
                ->where('education.education_status', $educationStatus)
                ->select('users.id', 'users.name', 'users.surname', 'off_days.date_of_start', 'off_days.type', 'off_days.start_date', 'off_days.due_date', 'off_days.number_of_days', 'education.education_status', 'education.degree', 'education.graduation_status', 'education.school_name', 'education.university_id', 'education.department_id')
                ->get();

            if (!$offDayType){
                    $offDays = DB::table('users')
                    ->join('education', 'users.id', '=', 'education.user_id')
                    ->where('education.education_status', $educationStatus)
                    ->select('users.id', 'users.name', 'users.surname', 'education.education_status', 'education.start_date', 'education.degree', 'education.graduation_status', 'education.school_name', 'education.university_id', 'education.department_id')
                    ->get();
            }

            if ($min_age && $max_age ) {
                $offDays = DB::table('users')
                    ->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR,users.birth_date,CURDATE())'),[$min_age,$max_age])
                    ->join('off_days', 'users.id', '=', 'off_days.user_id')
                    ->whereDate('off_days.start_date', '>=', Carbon::parse('2022-11-11')->format('Y-m-d'))
                    ->whereDate('off_days.due_date', '<=', Carbon::parse('2022-11-18')->format('Y-m-d'))
                    ->join('education', 'users.id', '=', 'education.user_id')
                    ->where('education.education_status', $educationStatus)
                    ->select('users.id','users.birth_date', 'users.name', 'users.surname', 'off_days.date_of_start', 'off_days.type', 'off_days.start_date', 'off_days.due_date', 'off_days.number_of_days', 'education.education_status', 'education.degree', 'education.graduation_status', 'education.school_name', 'education.university_id', 'education.department_id')
                    ->get();
            }


        }else{

            if($offDayType != null && is_numeric($offDayType)){
                if ($min_age && $max_age){
                    $offDays = DB::table('users')
                        ->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR,users.birth_date,CURDATE())'),[$min_age,$max_age])
                        ->join('off_days', 'users.id', '=', 'off_days.user_id')
                        ->whereDate('off_days.start_date', '>=', Carbon::parse('2022-11-11')->format('Y-m-d'))
                        ->whereDate('off_days.due_date', '<=', Carbon::parse('2022-11-18')->format('Y-m-d'))
                        ->select('users.id','users.birth_date', 'users.name', 'users.surname', 'off_days.date_of_start', 'off_days.type', 'off_days.start_date', 'off_days.due_date', 'off_days.number_of_days')
                        ->get();
                } else{
                    $offDays = DB::table('users')
                    ->whereBetween(DB::raw('TIMESTAMPDIFF(YEAR,users.birth_date,CURDATE())'),[$min_age,$max_age])

                    ->select('users.id','users.birth_date', 'users.name', 'users.surname')
                    ->get();

                    return $offDays;
                }// todo

            }

        }

         return view('super_admin.report', compact('offDays'));
         */
    }

    public function ilanlarimIcindeAra($selected){
        return $selected;
    }

    public function aramaSonuc(Request $request){
        return $request->ilan;
    }

    public function ilanGoster($ilan_id){
        $ilan = Ilan::with('resimler', 'durum', 'tipler', 'oda', 'mahalle', 'kimden', 'isitmaTur', 'Mahalle.ilce', 'Mahalle.ilce.il')
            ->where('id', $ilan_id)
            ->where('status', 1)
            ->first() ?? abort(403, 'Böyle bir ilan bulunamadı!');
        return view('front.single')->with('ilan', $ilan);

    }
    

    public function ilanAra(Request $request){

        if($request->il==0 && $request->ilce==0 && $request->mah==0 && $request->tip==0 && $request->kimden==0 && $request->durum==0){
            return redirect()->route('tumIlanlar')->withErrors('Lütlen en az bir özellik seçiniz!');
        }

        $ilanlar = null;
        $gelenler = [];
        $i = 0;

        if($request->il!=0){//$request->tip==0 && $request->kimden==0 && $request->durum==0
            if($request->ilce != 0){
                if($request->mah != 0){
                   $gelenler[$i++] = 'mahalle';
                   $gelenler[$i++] = 'id';
                   $gelenler[$i++] = $request->mah;
                }else{
                   $gelenler[$i++] = 'Mahalle.ilce';
                   $gelenler[$i++] = 'id';
                   $gelenler[$i++] = $request->ilce;
                }
            }else{
                $gelenler[$i++] = 'Mahalle.ilce';
                $gelenler[$i++] = 'il_id';
                $gelenler[$i++] = $request->il;
            }
        }

        //if($request->il != 0) $i++;

        if($request->tip!=0){
            $gelenler[$i++] = 'tip_id';
            $gelenler[$i++] = $request->tip;
        }

        if($request->durum!=0){
            $gelenler[$i++] = 'durum_id';
            $gelenler[$i++] = $request->durum;
        }
       
        if($request->kimden!=0){
            $gelenler[$i++] = 'kimden_id';
            $gelenler[$i++] = $request->kimden;
        }

        //return $gelenler;

        $i = 0;

        if($request->il != 0){
            if(sizeof($gelenler) == 3){//->simplePaginate(6);
                $ilanlar = Ilan::with('resimler', 'durum', 'tipler', 'oda', 'mahalle', 'kimden', 'isitmaTur', 'Mahalle.ilce', 'Mahalle.ilce.il')
                ->whereRelation($gelenler[$i++],$gelenler[$i++],$gelenler[$i++])
                //->get();
                ->simplePaginate(6);

                return view('front.search',compact('ilanlar'));
            }
    
            if(sizeof($gelenler) == 5){//->simplePaginate(6);
                $ilanlar = Ilan::with('resimler', 'durum', 'tipler', 'oda', 'mahalle', 'kimden', 'isitmaTur', 'Mahalle.ilce', 'Mahalle.ilce.il')
                ->whereRelation($gelenler[$i++],$gelenler[$i++],$gelenler[$i++])
                ->where($gelenler[$i++],$gelenler[$i++])
                //->get();
                ->simplePaginate(6);

                return view('front.search',compact('ilanlar'));
            }
    
            if(sizeof($gelenler) == 7){//->simplePaginate(6);
                $ilanlar = Ilan::with('resimler', 'durum', 'tipler', 'oda', 'mahalle', 'kimden', 'isitmaTur', 'Mahalle.ilce', 'Mahalle.ilce.il')
                ->whereRelation($gelenler[$i++],$gelenler[$i++],$gelenler[$i++])
                ->where($gelenler[$i++],$gelenler[$i++])
                ->where($gelenler[$i++],$gelenler[$i++])
                //->get();
                ->simplePaginate(6);

                return view('front.search',compact('ilanlar'));
            }
    
            if(sizeof($gelenler) == 9){//->simplePaginate(6);
                $ilanlar = Ilan::with('resimler', 'durum', 'tipler', 'oda', 'mahalle', 'kimden', 'isitmaTur', 'Mahalle.ilce', 'Mahalle.ilce.il')
                ->whereRelation($gelenler[$i++],$gelenler[$i++],$gelenler[$i++])
                ->where($gelenler[$i++],$gelenler[$i++])
                ->where($gelenler[$i++],$gelenler[$i++])
                ->where($gelenler[$i++],$gelenler[$i++])
                //->get();
                ->simplePaginate(6);

                return view('front.search',compact('ilanlar'));
            }

        }else{

            if(sizeof($gelenler) == 2){//->simplePaginate(6);
                $ilanlar = Ilan::with('resimler', 'durum', 'tipler', 'oda', 'mahalle', 'kimden', 'isitmaTur', 'Mahalle.ilce', 'Mahalle.ilce.il')
                ->where($gelenler[$i++],$gelenler[$i++])
                //->get();
                ->simplePaginate(6);

                return view('front.search',compact('ilanlar'));
            }
    
            if(sizeof($gelenler) == 4){//->simplePaginate(6);
                $ilanlar = Ilan::with('resimler', 'durum', 'tipler', 'oda', 'mahalle', 'kimden', 'isitmaTur', 'Mahalle.ilce', 'Mahalle.ilce.il')
                ->where($gelenler[$i++],$gelenler[$i++])
                ->where($gelenler[$i++],$gelenler[$i++])
                //->get();
                ->simplePaginate(6);

                return view('front.search',compact('ilanlar'));
            }
    
            if(sizeof($gelenler) == 6){//->simplePaginate(6);
                $ilanlar = Ilan::with('resimler', 'durum', 'tipler', 'oda', 'mahalle', 'kimden', 'isitmaTur', 'Mahalle.ilce', 'Mahalle.ilce.il')
                ->where($gelenler[$i++],$gelenler[$i++])
                ->where($gelenler[$i++],$gelenler[$i++])
                ->where($gelenler[$i++],$gelenler[$i++])
                //->get();
                ->simplePaginate(6);

                return view('front.search',compact('ilanlar'));
            }
        }
        
            $bos = 'Aradığınız kriterlere göre ilan bulunamadı!';
            return view('front.search',compact('ilanlar','bos'));

        //---------------------------------------------------------------------------------------------------------------------------------
        // foreach($ilanlar as $ilan){
        //     echo $ilan;
        //     echo '<br><br>';
        // }
        // return 'bitti';



        //---------------------------------------------------------------------------------------------------------------------------------
        //---------------------------------------------------------------------------------------------------------------------------------


        /*
        $sorgu = "SELECT*FROM ilanlar 
        INNER JOIN mahalleler ON ilanlar.mah_id = mahalleler.id 
        INNER JOIN ilceler ON ilceler.id=mahalleler.ilce_id 
        INNER JOIN iller ON iller.id=ilceler.il_id 
        INNER JOIN durum ON durum.id=ilanlar.durum_id 
        INNER JOIN tipler ON tipler.id=ilanlar.tip_id 
        INNER JOIN kimden ON kimden.id=ilanlar.kimden_id 
        LEFT OUTER JOIN resimler ON resimler.ilan_id=ilanlar.id OR resimler.id=null
        LEFT OUTER JOIN oda_sayisi ON oda_sayisi.id=ilanlar.oda_sayisi_id OR ilanlar.oda_sayisi_id=null
        LEFT OUTER JOIN isitma_tur ON isitma_tur.id=ilanlar.isitma_tur_id OR ilanlar.isitma_tur_id=null
        WHERE ilanlar.status=1 ";
        $ek = "";
        */

        $sorgu = "SELECT*FROM ilanlar 
        INNER JOIN mahalleler ON ilanlar.mah_id = mahalleler.id 
        INNER JOIN ilceler ON ilceler.id=mahalleler.ilce_id 
        INNER JOIN iller ON iller.id=ilceler.il_id 
        INNER JOIN durum ON durum.id=ilanlar.durum_id 
        INNER JOIN tipler ON tipler.id=ilanlar.tip_id 
        INNER JOIN kimden ON kimden.id=ilanlar.kimden_id 
        LEFT OUTER JOIN resimler ON resimler.ilan_id=ilanlar.id OR resimler.id=null
        LEFT OUTER JOIN oda_sayisi ON oda_sayisi.id=ilanlar.oda_sayisi_id OR ilanlar.oda_sayisi_id=null
        LEFT OUTER JOIN isitma_tur ON isitma_tur.id=ilanlar.isitma_tur_id OR ilanlar.isitma_tur_id=null
        WHERE ilanlar.status=1 ";
        $ek = "";

        if($request->il!=0){//$request->tip==0 && $request->kimden==0 && $request->durum==0
            if($request->ilce != 0){
                if($request->mah != 0){
                    $ek = $ek." AND ilanlar.mah_id=".$request->mah;
                }else{
                    $ek = $ek." AND ilceler.id=".$request->ilce;
                }
            }else{
                $ek = $ek." AND iller.id=".$request->il;
            }
        }
        if($request->tip!=0) $ek = $ek." AND ilanlar.tip_id=".$request->tip;
       
        if($request->durum!=0) $ek = $ek." AND ilanlar.durum_id=".$request->durum;
       
        if($request->kimden!=0) $ek = $ek." AND ilanlar.kimden_id=".$request->kimden;

        $ek = $ek." GROUP BY emlak.ilanlar.id";
        
        // $ek = $ek." GROUP BY ilanlar.id, ilanlar.user_id, ilanlar.tip_id, ilanlar.kimden_id, ilanlar.durum_id, ilanlar.mah_id, 
        // ilanlar.isitma_tur_id, ilanlar.oda_sayisi_id, ilanlar.baslik, ilanlar.fiyat, ilanlar.alan, ilanlar.adres, ilanlar.katSayisi, ilanlar.tel,
        // ilanlar.aciklama, ilanlar.status, ilanlar.created_at, ilanlar.updated_at";

        //return $sorgu.$ek;
        $ilanlar = DB::select($sorgu.$ek);
        //$array = json_decode(json_encode($ilanlar), true);
        //return count($ilanlar);
        return $ilanlar;

        foreach($ilanlar as $ilan){
            echo $ilan;
            echo '<br><br>';
        }
        return 'bitti';


        //return $ilanlar;
        //Echo gettype($ilanlar);
        
        $bos = 'Aradığınız kriterlere göre ilan bulunamadı!';
        if($ilanlar!=null){
            return view('front.search',compact('ilanlar'));
        }else{
            return view('front.search',compact('ilanlar','bos'));
        }
       
    }
}


/*
        //$ilanlar=[];
        $ilanlar=null;
        if($request->il!=0){// && $request->tip==0 && $request->kimden==0 && $request->durum==0
            
            if($request->ilce!=0 ){
                if($request->mah!=0){
                    $ilanlar = Ilan::with('resimler', 'durum', 'tipler', 'oda', 'mahalle', 'kimden', 'isitmaTur', 'Mahalle.ilce', 'Mahalle.ilce.il')
                    ->where('mah_id',$request->mah)
                    //->get();
                    ->simplePaginate(6);
                }else{
                    $ilanlar =  Ilan::with('resimler', 'durum', 'tipler', 'oda', 'mahalle', 'kimden', 'isitmaTur', 'Mahalle.ilce', 'Mahalle.ilce.il')
                    ->whereRelation('mahalle','ilce_id',$request->ilce)
                    //->get();
                    ->simplePaginate(6);
                }
            }else {
                $ilanlar = Ilan::with('resimler', 'durum', 'tipler', 'oda', 'mahalle', 'kimden', 'isitmaTur', 'Mahalle.ilce', 'Mahalle.ilce.il')
                ->whereRelation('Mahalle.ilce','il_id',$request->il)
                //->get();
                ->simplePaginate(6);
            }


            //return $ilanlar;
            return view('front.search',compact('ilanlar'));

            //$ilanlar=$adres;

        }
        $tip=null;
        if($request->tip!=0){
            $tip = Ilan::where('tip_id',$request->tip)
            ->get();

            if($ilanlar!=null){
            $ilanlar=array_merge($ilanlar,$tip);
            }
            else{
                $ilanlar=$tip;
            }
        }

        $durum=null;
        if($request->durum!=0){
            $durum = Ilan::where('durum_id',$request->durum)
            ->get();
            
            if($ilanlar!=null){
                $ilanlar=array_merge($ilanlar,$durum);
                }
                else{
                    $ilanlar=$tip;
                }
        }

        $kimden=null;
        if($request->kimden!=0){
            $kimden =  Ilan::where('kimden_id',$request->kimden)
            ->get();
            
            if($ilanlar!=null){
                $ilanlar=array_merge($ilanlar,$kimden);
                }
                else{
                    $ilanlar=$tip;
                }
        }


        //return $ilanlar;
        return dd($ilanlar);
        */


        /*$ilanlar = DB::table('ilanlar')
        ->join('mahalleler', function ($join) {
            $join->on('ilanlar.mah_id', '=', 'mahalleler.id');
        })
        ->join('ilceler', function ($join) {
            $join->on('mahalleler.ilce_id', '=', 'ilceler.id');
        })
        ->join('iller', function ($join) {
            $join->on('ilceler.il_id', '=', 'iller.id');
        })
         ->where('iller.id',$request->il)
        // ->where('ilceler.id',$request->ilce)
        // ->where('mahalleler.id',$request->mah)
       

        // ->where('tipler.id',$request->tip)
        // ->where('durum.id',$request->durum)
        // ->get();
        ->get();*/

        //$kelimeler = explode(" ", $request->key);

        
        /*
        // $ilanlar = Ilan::with('durum','tipler','mahalle','kimden','Mahalle.ilce','Mahalle.ilce.il')
        // ->where('status',1)
        // ->get();


        //MAHALLE
        // $sehir = DB::table('ilanlar')
        // ->join('mahalleler', function ($join) {
        //     $join->on('ilanlar.mah_id', '=', 'mahalleler.id');
        // })
        // ->where('mahalleler.id',$request->mah);

        //İLÇE
        $ilce = DB::table('mahalleler')
        ->join('ilceler', function ($join) {
            $join->on('mahalleler.ilce_id', '=', 'ilceler.id');
        })
        ->where('ilceler.id',$request->ilce);

        //ŞEHİR
        $mahalle = DB::table('ilceler')
        ->join('iller', function ($join) {
            $join->on('ilceler.il_id', '=', 'iller.id');
        })
        ->where('iller.id',$request->il);
*/

        // $ilanlar = null;
        // $il = $request->il;
        // if($request->il==0 && $request->ilce==0 && $request->mah==0 && $request->tip==0 && $request->kimden==0 && $request->durum==0){
        //     return redirect()->route('tumIlanlar')->withErrors('Lütlen en az bir özellik seçiniz!');
        // }
/*
        $ilanlar = DB::table('ilanlar')
        ->join('mahalleler', function ($join) {
            $join->on('ilanlar.mah_id', '=', 'mahalleler.id');
        })
        ->join('ilceler', function ($join) {
            $join->on('mahalleler.ilce_id', '=', 'ilceler.id');
        })
        ->Where(function($query) use($request) {
            $query->where('ilceler.il_id', '=', $request->il)
                  ->orWhere('ilceler.il_id', '>', 0);
        })
        ->where(function($query) use($request) {
            $query->where('ilceler.id', '=', $request->ilce)
                  ->orWhere('ilceler.id', '>', $request->ilce);
        })
        ->where(function($query) use($request) {
            $query->where('ilanlar.mah_id', '=', $request->mah)
                  ->orWhere('ilanlar.id', '>', $request->mah);
        })
        ->get();


        echo $ilanlar['ilceler']->il_id.' '.$ilanlar['ilceler']->id.' '.$ilanlar['ilceler']->id.'<br>';

*/