<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\IlanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MyAuthController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::post('/ilan_ver',[IlanController::class,'ilanOlustur'])->name('ilanOlustur');

//Route::redirect('/anasayfa','login');

//Back
Route::get('/anasayfa',[HomepageController::class,'index'])->name('homepage');
Route::group(['middleware'=>['isAdmin','preventBackHistory']],function(){
    Route::get('/admin/panel',[AdminController::class,'index'])->name('admin_panel');
    Route::get('/admin/panel/bekleyen_ilanlar',[AdminController::class,'bekleyenIlanlar'])->name('admin_onay_bekleyenler');
    Route::get('/admin/panel/onaylanan_ilanlar',[AdminController::class,'onaylanmisIlanlar'])->name('admin_onaylanmis_ilanlar');
    Route::get('/admin/panel/ilan_detay/{ilan_id}',[AdminController::class,'ilanDetay'])->name('admin_ilan_detay');
    Route::get('/admin/panel/ilan_onayla/{ilan_id}',[AdminController::class,'ilanOnayla'])->name('admin_ilan_onayla');
    Route::get('/admin/panel/sil/{ilan_id}',[AdminController::class,'ilanSil'])->name('admin_ilan_sil');
    Route::get('/admin/cikis',[AdminController::class,'cikis'])->name('admin_cikis');
});

Route::group(['middleware'=>['isLogoutAdmin','preventBackHistory']],function(){
    Route::get('/admin/giris',[AdminController::class,'giris'])->name('admin_giris');
    Route::post('/admin/giris',[AdminController::class,'girisPost'])->name('admin_giris_post');
});
//Route::resource('/admin/ilan_düzenle',[AdminIlanController::class]);

//Front

Route::group(['middleware'=>['isLogoutUser']],function(){
    //Giriş Kayıt işlemleri
    Route::get('/kayit_ol',[MyAuthController::class,'register'])->name('my_register');
    Route::post('/kayit_ol',[MyAuthController::class,'registerPost'])->name('my_register_post');
    Route::get('/giris_yap',[MyAuthController::class,'login'])->name('my_login');
    Route::post('/giris_yap',[MyAuthController::class,'loginPost'])->name('my_login_post');
});


Route::group(['middleware'=>['isUser','preventBackHistory']],function(){
    Route::get('/ilan_guncelle/adres/il_id={id}',[IlanController::class,'getIlce']);  
    Route::get('/ilan_guncelle/adres/ilce_id={id}',[IlanController::class,'getMah']);

    Route::get('/adres/il_id={id}',[IlanController::class,'getIlce']);  
    Route::get('/adres/ilce_id={id}',[IlanController::class,'getMah']);
    
    Route::get('/ilan_ver',[IlanController::class,'ilanVer'])->name('ilanVer');
    //İlan güncelleme
    Route::get('/ilan_guncelle/{ilan_id}',[IlanController::class,'guncelle'])->name('guncelle');
    Route::post('/ilan_guncelle/{ilan_id}',[IlanController::class,'guncellePost'])->name('guncelle_post');
    Route::get('/ilan_sil/{ilan_id}',[IlanController::class,'ilanSil'])->name('ilan_sil');


    Route::get('/ilanlar',[IlanController::class,'tumIlanlar'])->name('tumIlanlar');
    Route::get('/ilanlar/{ilan_id}',[IlanController::class,'ilanlar'])->name('ilanlar');

    Route::get('/ilanlarim',[IlanController::class,'tumIlanlarim'])->name('tumIlanlarim');
    Route::get('/ilanlarim/{ilan_id}',[IlanController::class,'ilanlarim'])->name('ilanlarim');
    //İlan vermek için kullanılıyor
    Route::post('/ilan_ver',[IlanController::class,'ilankaydet'])->name('ilankaydet');

    //Arama algoritmaları
    //Route::get('/ilanaraaa',[SearchController::class,'aramaSonuc'])->name('arama_sonuc');
    Route::post('/ilanara',[SearchController::class,'ilanAra'])->name('ilanara');
    Route::get('/ilanara/{ilan_id}',[SearchController::class,'ilanGoster'])->name('ilan_goster');
 
    Route::post('/ilanaraaaxxx/ilan',[SearchController::class,'aramaSonuc'])->name('arama_sonuc');
    //Route::view('front.searchsingle','ilan')->name('arama_sonuc');
    //Route::post('/ilanlarim_icinde_ara={select}',[SearchController::class,'ilanlarimIcindeAra'])->name('ilanlarim_icinde_ara');


    // Route::get('/ilanaraaaaaa', function ($ilan) {
    //     return view('front.searchsingle',compact('ilan'));
    // })->name('arama_sonuc2');
    


    //Çıkış
    Route::get('/cikis_yap',[MyAuthController::class,'logout'])->name('my_logout');    
});

Route::get('/',[HomeeController::class,'index'])->name('homee');
Route::get('/hakkimizda',[AboutController::class,'index'])->name('about');
Route::get('/iletisim',[ContactController::class,'index'])->name('contact');
//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
