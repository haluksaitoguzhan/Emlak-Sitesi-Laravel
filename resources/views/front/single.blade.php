@extends('front.layouts.master')
@section('title','Emlak Sitesi')

@section('content')
<!--/ Intro Single star /-->
<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">{{ $ilan->baslik }}</h1>
            <span class="color-text-a">{{ $ilan->mahalle->ilce->il->il }} / {{ $ilan->mahalle->ilce->ilce }} / {{ $ilan->mahalle->mahalle }} / {{ $ilan->adres}}</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('homepage') }}">Anasayfa</a>
              </li>
              @if(Request::segment(1) == 'ilanlarim')
              <li class="breadcrumb-item">
                <a href="{{ route('guncelle',$ilan->id) }}" >Düzenle</a>
              </li>
              @endif
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Single Star /-->
  <section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-md-1 col-sm-12"></div>
        <div class="col-md-10 col-sm-12">
          <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
            
            @foreach($ilan->resimler as $ilanresim)
              <div class="carousel-item-b">
                <img src="{{ asset($ilanresim->resim)}}" height="500" alt="">
              </div>
            @endforeach

          </div>
          <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="ion-money">₺</span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h5 class="title-c">{{ $ilan->fiyat }}</h5>
                  </div>
                </div>
              </div>
              <div class="property-summary">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d section-t4">
                      <h3 class="title-d">Detaylı Bilgi:</h3>
                    </div>
                  </div>
                </div>
                <div class="summary-list">
                  <ul class="list">
                    <li class="d-flex justify-content-between">
                      <strong>İlan Numarası:</strong>
                      <span>{{ $ilan->id }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Konum:</strong>
                      <span>{{ $ilan->mahalle->mahalle }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>İlan Tipi:</strong>
                      <span>{{ $ilan->tipler->tip }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Kimden:</strong>
                      <span>{{ $ilan->kimden->kimden }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Durumu:</strong>
                      <span>{{ $ilan->durum->durum }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Alan:</strong>
                      <span>{{ $ilan->alan }} m
                        <sup>2</sup>
                      </span>
                    </li>
                    @isset($ilan->oda->oda_sayisi)
                    <li class="d-flex justify-content-between">
                      <strong>Oda:</strong>
                      <span>{{ $ilan->oda->oda_sayisi}}</span>
                    </li>
                    @endif
                    @isset($ilan->isitmaTur->isitma_tur)
                    <li class="d-flex justify-content-between">
                      <strong>Isıtma:</strong>
                      <span>{{ $ilan->isitmaTur->isitma_tur }}</span>
                    </li>
                    @endif
                    @isset($ilan->katSayisi)
                    <li class="d-flex justify-content-between">
                      <strong>Kat Sayısı:</strong>
                      <span>{{ $ilan->katSayisi }}</span>
                    </li>
                    @endif
                    <li class="d-flex justify-content-between">
                      <strong>İletişim:</strong>
                      <span>{{ $ilan->tel }}</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-lg-7 section-md-t3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">{{ $ilan->baslik }}</h3>
                  </div>
                </div>
              </div>
              <div class="property-description">
                <p class="description color-text-a">
                  {{ $ilan->aciklama }}
                </p>
              </div>

            </div>
          </div>
        </div>
        <div class="col-md-1 col-sm-12"></div>
        
  </section>
  <!--/ Property Single End /-->
@endsection