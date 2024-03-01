@extends('front.layouts.master')
@section('title','Emlak Sitesi')

@section('content')
<!--/ Carousel Star /-->
<div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
        @foreach($sliders as $slider)
        @if($slider->image != null)
        <div class="carousel-item-a intro-item bg-image" style="background-image: url({{$slider->image}})">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top">On Numara İlan
                                        <br> Kiralık
                                    </p>
                                    <h1 class="intro-title mb-4">
                                        <span class="color-b">İstanbul </span> Kadıköy
                                        <br> On numara ilan
                                    </h1>
                                    <p class="intro-subtitle intro-price">
                                        <a href="#"><span class="price-a">Sahibinden | 70.000 ₺</span></a>
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

<!--/ Intro Single star /-->
<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single" >İlanlarımız</h1>
            <span class="color-text-a">İlan vermek için <a href="{{ route('my_login')}}">Giriş</a> yap veya <a href="{{ route('my_register')}}">Kaydol</a></span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

<!--/ Property Grid Star /-->
<section class="property-grid grid">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="grid-option">
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
    </div>
    <div class="row">
      {{ $ilanlar->links() }}
    </div>
  </section>
  <!--/ Property Grid End /-->
</section>
<!--/ Property End /-->

<!--/ Testimonials Star /-->
<section class="section-testimonials section-t8 nav-arrow-a">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Referanslar</h2>
            </div>
          </div>
        </div>
      </div>
      <div id="testimonial-carousel" class="owl-carousel owl-arrow">
        <div class="carousel-item-a">
          <div class="testimonials-box">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-img">
                  <img src="{{ asset('front')}}/img/testimonial-1.jpg" alt="" class="img-fluid">
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-ico">
                  <span class="ion-ios-quote"></span>
                </div>
                <div class="testimonials-content">
                  <p class="testimonial-text">
                    Uzun süredir bir ev arayışı içindeydik. Hayalimdeki evi bu sitede bulacağım hiç aklıma gelmemişti. 
                    Allah EmlakSitesi'nden razı olsun. Bize böyle bir imkan sundukları için onlara teşekkür borcumu 
                    iletmek istedim.
                  </p>
                </div>
                <div class="testimonial-author-box">
                  <img src="{{ asset('front')}}/img/mini-testimonial-1.jpg" alt="" class="testimonial-avatar">
                  <h5 class="testimonial-author">Yusuf & Merve</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-a">
          <div class="testimonials-box">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-img">
                  <img src="{{ asset('front')}}/img/testimonial-2.jpg" alt="" class="img-fluid">
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-ico">
                  <span class="ion-ios-quote"></span>
                </div>
                <div class="testimonials-content">
                  <p class="testimonial-text">
                    Uzun süredir bir ev arayışı içindeydik. Hayalimdeki evi bu sitede bulacağım hiç aklıma gelmemişti. 
                    Allah EmlakSitesi'nden razı olsun. Bize böyle bir imkan sundukları için onlara teşekkür borcumu 
                    iletmek istedim.
                  </p>
                </div>
                <div class="testimonial-author-box">
                  <img src="{{ asset('front')}}/img/mini-testimonial-2.jpg" alt="" class="testimonial-avatar">
                  <h5 class="testimonial-author">Hakan & Sibel</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Testimonials End /-->

@endsection