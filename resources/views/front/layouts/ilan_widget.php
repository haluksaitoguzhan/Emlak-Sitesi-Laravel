@isset($ilanlar)
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
                  <a href="{{route('ilanlarim',$ilan->id)}}">{{ $ilan->adres }}
                    <br /> {{ $ilan->mahalle->mahalle }}</a>
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
                    <h4 class="card-info-title">Alan</h4>
                    <span>{{ $ilan->alan }}m
                      <sup>2</sup>
                    </span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Tip</h4>
                    <span>{{ $ilan->tipler->tip }}</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Oda</h4>
                    <span>{{ $ilan->oda->oda_sayisi }}</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Kat</h4>
                    <span>{{ $ilan->katSayisi }}</span>
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
