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
          @if(Request::segment(1) == 'ilanlarim')
          <h1 class="title-single">Tüm ilanlarım</h1>
          <span class="color-text-a">İlanlarım</span>
          @elseif(Request::segment(1) == 'ilanara')
          <h1 class="title-single">Tüm Aramalar</h1>
          <span class="color-text-a">Arama sonuçları</span>
          @else
          <h1 class="title-single">Tüm ilanlar</h1>
          <span class="color-text-a">İlanlar</span>
          @endif
        </div>
      </div>
      <div class="col-md-12 col-lg-4">
        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('homepage') }}">Anasayfa</a>
            </li>
            @if(Request::segment(1) == 'ilanlarim')
            <li class="breadcrumb-item active" aria-current="page">
              Tüm ilanlarım
            </li>
            @elseif(Request::segment(1) == 'ilanara')
            <li class="breadcrumb-item active" aria-current="page">
              Arama sonuçları
            </li>
            @else
            <li class="breadcrumb-item active" aria-current="page">
              Tüm ilanlar
            </li>
            @endif
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!--/ Intro Single End /-->


<!-- Burası button artı hata dönme yeridir -->
<!-- <div class="container">
  <div class="d-flex col-sm-12">
    <div class="col-md-6">
        @if($errors->any())
        <div class="alert alert-danger d-flex justify-content-start">
          <script>var open=document.querySelector("body");
                  open.classList.add("box-collapse-open")</script>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </div>
        @endif
    </div>
    <div class="col-sm-6">
      <div class="d-flex justify-content-end">
        @if(Request::segment(1) == 'ilanlar')
        <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
            <span class="fa fa-search" aria-hidden="true"></span> Dilediğini ara
          </button>
        </div>
        @endif
      </div>
    </div>
  </div>
</div> -->

<!--/ Property Grid Star /-->
<section class="property-grid grid">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="grid-option">

          @if(Request::segment(1) == 'ilanlar')
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
              <span class="fa fa-search" aria-hidden="true"></span> Dilediğini ara
            </button>
          </div>
          @endif
          <!-- <form>
              <select class="custom-select" id="select" name="select" onchange="getSelectedId()">
                <option value="0" selected>Hepsi</option>
                <option value="1">Yeniden Eskiye</option>
                <option value="2">Kiralık</option>
                <option value="3">Satılık</option>
              </select>
            </form> -->
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


      <!-- 
        <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="{{ asset('front')}}/img/property-3.jpg" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="#">204 Mount
                      <br /> Olive Road Two</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">rent | $ 12.000</span>
                  </div>
                  <a href="property-single.html" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Area</h4>
                      <span>340m
                        <sup>2</sup>
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Beds</h4>
                      <span>2</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Baths</h4>
                      <span>4</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Garages</h4>
                      <span>1</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="{{ asset('front')}}/img/property-6.jpg" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="#">204 Mount
                      <br /> Olive Road Two</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">rent | $ 12.000</span>
                  </div>
                  <a href="property-single.html" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Area</h4>
                      <span>340m
                        <sup>2</sup>
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Beds</h4>
                      <span>2</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Baths</h4>
                      <span>4</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Garages</h4>
                      <span>1</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="{{ asset('front')}}/img/property-7.jpg" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="#">204 Mount
                      <br /> Olive Road Two</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">rent | $ 12.000</span>
                  </div>
                  <a href="property-single.html" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Area</h4>
                      <span>340m
                        <sup>2</sup>
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Beds</h4>
                      <span>2</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Baths</h4>
                      <span>4</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Garages</h4>
                      <span>1</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="{{ asset('front')}}/img/property-8.jpg" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="#">204 Mount
                      <br /> Olive Road Two</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">rent | $ 12.000</span>
                  </div>
                  <a href="property-single.html" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Area</h4>
                      <span>340m
                        <sup>2</sup>
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Beds</h4>
                      <span>2</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Baths</h4>
                      <span>4</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Garages</h4>
                      <span>1</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="{{ asset('front')}}/img/property-10.jpg" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="#">204 Mount
                      <br /> Olive Road Two</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">rent | $ 12.000</span>
                  </div>
                  <a href="property-single.html" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Area</h4>
                      <span>340m
                        <sup>2</sup>
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Beds</h4>
                      <span>2</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Baths</h4>
                      <span>4</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Garages</h4>
                      <span>1</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->

      <!-- Burası Nav -->
      <!-- <div class="row">
        <div class="col-sm-12">
          <nav class="pagination-a">
            <ul class="pagination justify-content-end">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <span class="ion-ios-arrow-back"></span>
                </a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="#">
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div> -->
    </div>
    <div class="row">
      {{ $ilanlar->links() }}
    </div>
</section>
<!--/ Property Grid End /-->
@endsection