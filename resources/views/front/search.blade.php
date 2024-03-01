@extends('front.layouts.master')
@section('title','Emlak Sitesi')

@section('content')

@include('front.layouts.searchpage')
<!--/ Intro Single star /-->
<section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single">Tüm Aramalar</h1>
          <span class="color-text-a">Arama sonuçları</span>
        </div>
      </div>
      <div class="col-md-12 col-lg-4">
        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('homepage') }}">Anasayfa</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Arama sonuçları
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!--/ Intro Single End /-->


<!--/ Property Grid Star /-->
<section class="property-grid grid">
  <div class="container">
    <div class="row">
      

      @isset($bos)
      <div class="alert alert-danger">
        <li>{{ $bos }}</li>
      </div>
      @else

      <div class="col-sm-12">
        <div class="grid-option">
          <form>
              <select class="custom-select" id="select" name="select" onchange="getSelectedId()">
                <option value="0" selected>Hepsi</option>
                <option value="1">Yeniden Eskiye</option>
                <option value="2">Kiralık</option>
                <option value="3">Satılık</option>
              </select>
            </form>
        </div>
      </div>
     

      @foreach($ilanlar as $ilan)
      @if($ilan->resimler->first() != null)
      <div class="col-md-4">
        <div class="card-box-a card-shadow">
          <div class="img-box-a">
            <img src="{{ asset($ilan->resimler->first()->resim)}}" alt="" class="img-a img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-overlay-a-content">
              <div class="card-header-a">
                <h2 class="card-title-a">
                  @if(Request::segment(1) == 'ilanlarim')
                  <a href="{{route('ilanlarim',$ilan->id)}}">{{ $ilan->adres }}
                    <br /> {{ $ilan->mahalle->mahalle }}</a>
                  @elseif(Request::segment(1) == 'ilanara')
                  <a href="{{route('ilan_goster',$ilan->id)}}">{{ $ilan->adres }}
                    <br /> {{ $ilan->mahalle->mahalle }}</a>
                  @else
                  <a href="{{route('ilanlar',$ilan->id)}}">{{ $ilan->adres }}
                    <br /> {{ $ilan->mahalle->mahalle }}</a>
                  @endif
                </h2>
              </div>
              <div class="card-body-a">
                <div class="price-box d-flex">
                  <span class="price-a">{{ $ilan->durum->durum }} | {{ $ilan->fiyat }} ₺</span>
                </div>
                @if(Request::segment(1) == 'ilanlarim')
                <a href="{{ route('ilanlarim',$ilan->id) }}" class="link-a">İncelemek için tıklayın...
                  <span class="ion-ios-arrow-forward"></span>
                </a>
                @else
                <a href="{{ route('ilanlar',$ilan->id) }}" class="link-a">İncelemek için tıklayın...
                  <span class="ion-ios-arrow-forward"></span>
                </a>
                @endif
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

      @endif
    </div>
    <div class="row">
    {{ $ilanlar->links() }}
    </div>
</section>
<!--/ Property Grid End /-->
@endsection