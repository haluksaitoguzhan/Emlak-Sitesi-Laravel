@extends('front.layouts.master')
@section('title','Emlak Sitesi')

@section('content')
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>




<!--/ Carousel Star /-->
<div class="intro intro-carousel">
  <div id="carousel" class="owl-carousel owl-theme">
    @foreach($sliders as $slider)
    @if($slider->resimler->first() != null)
    <div class="carousel-item-a intro-item bg-image" style="background-image: url('{{ asset($slider->resimler->first()->resim) }}')">
      <div class="overlay overlay-a"></div>
      <div class="intro-content display-table">
        <div class="table-cell">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="intro-body">
                  <p class="intro-title-top">{{ $slider->mahalle->mahalle }}
                    <br> {{ $slider->mah_id }}
                  </p>
                  <h1 class="intro-title mb-4">
                    <span class="color-b">{{ $slider->adres }} </span> {{ $slider->mahalle->mahalle }}
                    <br> {{ $slider->baslik }}
                  </h1>
                  <p class="intro-subtitle intro-price">
                    <a href="#"><span class="price-a">{{ $slider->durum->durum }} | {{ $slider->fiyat }} ₺</span></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
    @endforeach
  </div>
</div>
<!--/ Carousel end /-->

<!--/ resim sorguluyorum /-->

<!--/ Intro Single star /-->
<section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single"><a href="{{ route('ilanVer')}}">Hemen İlan Ver</a></h1>
          <span class="color-text-a">İlan vermek için tıklayın</span>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Intro Single End /-->

<!--/ Property Star /-->
<section class="section-property section-t8">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="title-a">İlanlarım</h2>
          </div>
          <div class="title-link">
            <a href="{{ route('tumIlanlarim')}}">Tüm ilanlarım
              <span class="ion-ios-arrow-forward"></span>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div id="property-carousel" class="owl-carousel owl-theme">
      @foreach($ilanlar as $ilan)
      @if($ilan->resimler->first() != null)
      <div class="carousel-item-b">
        <div class="card-box-a card-shadow">
          <div class="img-box-a">
            <img src="{{ asset($ilan->resimler->first()->resim)}}" alt="" class="img-a img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-overlay-a-content">
              <div class="card-header-a">
                <h2 class="card-title-a">
                  <a href="{{route('ilanlarim',$ilan->id)}}">{{ $ilan->kimden->kimden }}
                    <br /> {{ $ilan->baslik }}</a>
                </h2>
              </div>
              <div class="card-body-a">
                <div class="price-box d-flex">
                  <span class="price-a">{{ $ilan->durum->durum }} | {{ $ilan->fiyat }} ₺</span>
                </div>
                <a href="{{ route('ilanlarim',$ilan->id) }}" class="link-a">İncelemek için tıklayın...
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </div>
              <div class="card-footer-a">
                <ul class="card-info d-flex justify-content-around">
                  <li>
                    <h4 class="card-info-title">Kimden</h4>
                    <span>{{ $ilan->kimden->kimden }}</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Tip</h4>
                    <span>{{ $ilan->tipler->tip }}</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Şehir</h4>
                    <span>{{ $ilan->mahalle->ilce->il->il }}</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
      @endforeach
</section>
<!--/ Property End /-->

<!--/ News Star /-->
<section class="section-news section-t8">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="title-a">Son İlanlar</h2>
          </div>
          <div class="title-link">
            <a href="{{ route('tumIlanlar')}}">Bütün ilanlar
              <span class="ion-ios-arrow-forward"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div id="new-carousel" class="owl-carousel owl-theme">

      @foreach($sonilanlar as $ilan)
      @if($ilan->resimler->first() != null)
      <div class="carousel-item-c">
        <div class="card-box-b card-shadow news-box">
          <div class="img-box-b">
            <img src="{{ asset($ilan->resimler->first()->resim)}}" alt="" class="img-b img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-header-b">
              <div class="card-category-b">
                <a href="#" class="category-b">{{ $ilan->tipler->tip }}</a>
              </div>
              <div class="card-title-b">
                <h2 class="title-2">
                  <a href="{{ route('ilanlar',$ilan->id) }}">Sakın kaçırma!
                    <br> hemen ilana git</a>
                </h2>
              </div>
              <div class="card-date">
                <span class="date-b">{{$ilan->created_at->diffForHumans()}}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
      @endforeach

    </div>
</section>
<!--/ News End /-->



@endsection