@extends("front.layouts.master")
@section('title','İlan Güncelle')
@section('content')
<!--/ Intro Single star /-->
<section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single">İlan Güncelle</h1>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Intro Single End /-->

<!-- @if($errors->any())
    <div class="alert alert-danger">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </div>
  @endif -->

<!--/ Contact Star /-->
<section class="contact">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 section-t8">
        <div class="row">
          <div class="col-md-7">
            <form class="form-a contactForm" action="{{route('guncelle_post',$ilan->id)}}" method="POST" role="form" enctype="multipart/form-data">
              @csrf
              @if($errors->any())
              <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </div>
              @endif

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label>İlan Başlığı:</label>
                  <input type="text" value="{{ $ilan->baslik }}" name="baslik" class="form-control form-control-lg form-control-a" placeholder="İlan Başlığını Giriniz" data-rule="minlen:3" data-msg="Lütfen başlık giriniz!">
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label>Fiyat:</label>
                  <input type="text" value="{{ $ilan->fiyat }}" name="fiyat" class="form-control form-control-lg form-control-a" placeholder="Fiyat" data-rule="minlen:1" data-msg="Lütfen Fiyat Giriniz!">
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="state">Kimden:</label>
                  <select class="form-control form-control-lg form-control-a" id="kimden" name="kimden" data-msg="Lütfen seçim yapınız!">
                    <option value="0">Kimden</option>
                    @foreach($kimden as $k)
                    <option value="{{ $k->id }}" @if($ilan->kimden->id == $k->id) selected @endif>{{$k->kimden}}</option>
                    @endforeach
                  </select>
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="state">Durum:</label>
                  <select class="form-control form-control-lg form-control-a" id="durum" name="durum" data-msg="Lütfen durum seçiniz!">
                    <option value="0">Durum Seçiniz</option>
                    @foreach($durum as $d)
                    <option value="{{ $d->id }}" @if($ilan->durum->id == $d->id) selected @endif> {{$d->durum}}</option>
                    @endforeach
                  </select>
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="type">Tip:</label>
                  <select class="form-control form-control-lg form-control-a" id="tip" name="tip" data-msg="Lütfen tip seçiniz!" onchange="tipSet()">
                    <option value="0">Tip Seçiniz</option>
                    @foreach($tipler as $tip)
                    <option value="{{ $tip->id }}" @if($ilan->tipler->id == $tip->id) selected @endif>{{$tip->tip}}</option>
                    @endforeach
                  </select>
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label>Alan:</label>
                  <input type="text" value="{{ $ilan->alan }}" name="alan" class="form-control form-control-lg form-control-a" placeholder="Alan" data-rule="minlen:1" data-msg="Lütfen Alan Giriniz!">
                  <div class="validation"></div>
                </div>
              </div>

              @isset($ilan->oda)
              <div class="col-md-12 mb-3" id="oda_id">
                <div class="form-group">
                  <label for="room">Oda Sayısı:</label>
                  <select class="form-control form-control-lg form-control-a" id="oda_sayisi" name="oda_sayisi" data-msg="Lütfen oda sayısını seçiniz!">
                    <option value="0">Oda sayısını seçiniz</option>
                    @foreach($oda_sayisi as $od)
                    <option value="{{ $od->id }}" @if($ilan->oda->id == $od->id) selected @endif>{{$od->oda_sayisi}}</option>
                    @endforeach
                  </select>
                  <div class="validation"></div>
                </div>
              </div>
              @endif

              @isset($ilan->isitmaTur)
              <div class="col-md-12 mb-3" id="isitma_id">
                <div class="form-group">
                  <label for="room">Isıtma türü:</label>
                  <select class="form-control form-control-lg form-control-a" id="isitma_tur" name="isitma_tur" data-msg="Lütfen ısıtma türünü seçiniz!">
                    <option value="0">İsitma türünü seçiniz</option>
                    @foreach($isitma_tur as $it)
                    <option value="{{ $it->id }}" @if($ilan->isitmaTur->id == $it->id) selected @endif>{{$it->isitma_tur}}</option>
                    @endforeach
                  </select>
                  <div class="validation"></div>
                </div>
              </div>
              @endif

              @isset($ilan->katSayisi)
              <div class="col-md-12 mb-3" id="kat_id">
                <div class="form-group">
                  <label>Kat:</label>
                  <input type="text" name="kat_sayisi" id="kat_sayisi" class="form-control form-control-lg form-control-a" placeholder="Kat Sayısı" data-rule="minlen:1" data-msg="Lütfen Kat Giriniz!">
                  <div class="validation"></div>
                </div>
              </div>
              @endif

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  @include('front.layouts.img_del_checkbox') <br /><br />
                  <label>Resim Seç:</label>
                  <input class="form-control form-control-lg form-control-a" type="file" id="resim" name="resim[]" multiple accept="image/png, image/jpeg, image/jpg">
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="floor">İl:</label>
                  <select class="form-control form-control-lg form-control-a" id="il" name="il" onchange="getIlId()" data-msg="Lütfen il seçiniz!">
                    <option value="0">İl seçiniz</option>
                    @foreach($iller as $il)
                    <option value="{{ $il->id }}">{{$il->il}}</option>
                    @endforeach
                  </select>
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="floor">İlçe:</label>
                  <select class="form-control form-control-lg form-control-a" id="ilce" name="ilce" onchange="getIlceId()" data-msg="Lütfen ilçe seçiniz!">
                    <option>İlçe seçiniz</option>
                  </select>
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="floor">Mahalle:</label>
                  <select class="form-control form-control-lg form-control-a" id="mah" name="mah" data-msg="Lütfen mahalle seçiniz!">
                    <option>Mahalle seçiniz</option>
                  </select>
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label>Adres:</label>
                  <input type="text" value="{{ $ilan->adres }}" name="adres" class="form-control form-control-lg form-control-a" placeholder="Adresinizi Giriniz" data-rule="minlen:3" data-msg="Adres giriniz!">
                  <div class="validation"></div>
                </div>
              </div>


              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label>Telefon:</label>
                  <input type="text" value="{{ $ilan->tel }}" name="tel" class="form-control form-control-lg form-control-a" placeholder="İlan Başlığını Giriniz" data-rule="minlen:11" data-msg="Telefon numarası giriniz!">
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label>Açıklama:</label>
                  <textarea name="aciklama" class="form-control" cols="45" rows="6" data-rule="required" data-msg="Lütfen açıklama giriniz!" placeholder="Açıklama">{{ $ilan->aciklama }}</textarea>
                  <div class="validation"></div>
                </div>
              </div>

              <button type="submit" class="btn btn-a">Güncelle</button>
            </form>
            <br>
            <!-- <div class="col-md-7"> -->
            <button class="btn btn-a btn-xs" data-toggle="modal" data-target="#advDelModal" onchange="onChangeDelAdv()">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
              </svg>

              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              İlanı Sil
              <span class="bi bi-trash"></span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- Logout Modal-->
  <div class="modal fade" id="advDelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sil!</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">İlanı silmek istediğinize emin misiniz?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
          <a class="btn btn-primary" href="{{ route('ilan_sil',$ilan->id) }}">Sil</a>
        </div>
      </div>
    </div>
  </div>

</section>
<!--/ Contact End /-->
<script>
  function getIlId() {
    $('#ilce').find('option').remove().end();
    $('#mah').find('option').remove().end();
    var il = document.getElementById('il').value;
    //console.log(il);
    $.ajax({
      type: "get",
      url: 'adres/il_id=' + il,
      success: function(data) {
        var opt = document.createElement("option");
        document.getElementById('ilce').options.add(opt);
        opt.text = 'İlçe seçiniz!';
        opt.value = 0;
        data.forEach(getIlce);
        //document.getElementById('ilce').value=data
      }
    });
  }

  function getIlce(item) {
    //console.log(item+"/"+x.ilce);
    var opt = document.createElement("option");
    document.getElementById('ilce').options.add(opt);
    opt.text = item.ilce;
    opt.value = item.id;
  }

  function getIlceId() {
    $('#mah').find('option').remove().end();
    var ilce = document.getElementById('ilce').value;
    //console.log(il);
    $.ajax({
      type: "get",
      url: 'adres/ilce_id=' + ilce,
      success: function(data) {
        var opt = document.createElement("option");
        document.getElementById('mah').options.add(opt);
        opt.text = 'Mahalle seçiniz!';
        opt.value = 0;
        data.forEach(getMah);
        //document.getElementById('ilce').value=data
      }
    });
  }

  function getMah(item) {
    var opt = document.createElement("option");
    document.getElementById('mah').options.add(opt);
    opt.text = item.mahalle;
    opt.value = item.id;
  }

  function tipSet() {
    var tip = document.getElementById('tip').value;
    if (tip == 3) {
      document.getElementById('oda_id').innerHTML = "";
      document.getElementById('isitma_id').innerHTML = "";
      document.getElementById('kat_id').innerHTML = "";
    } else {
      document.getElementById('oda_id').innerHTML = '<div class="form-group"><label for="room">Oda Sayısı</label><select class="form-control form-control-lg form-control-a" id="oda_sayisi" name="oda_sayisi" data-msg="Lütfen oda sayısını seçiniz!"><option value="0">Oda sayısını seçiniz</option>@foreach($oda_sayisi as $od)<option value="{{ $od->id }}">{{$od->oda_sayisi}}</option>@endforeach</select><div class="validation"></div></div>';
      document.getElementById('isitma_id').innerHTML = '<div class="form-group"><label for="room">Isıtma türü</label><select class="form-control form-control-lg form-control-a" id="isitma_tur" name="isitma_tur" data-msg="Lütfen ısıtma türünü seçiniz!"><option value="0">İsitma türünü seçiniz</option>@foreach($isitma_tur as $it)<option value="{{ $it->id }}">{{$it->isitma_tur}}</option>@endforeach</select><div class="validation"></div></div>';
      document.getElementById('kat_id').innerHTML = '<div class="form-group"><label>Kat</label><input type="text" name="kat_sayisi" id="kat_sayisi" class="form-control form-control-lg form-control-a" placeholder="Kat Sayısı" data-rule="minlen:1" data-msg="Lütfen Kat Giriniz!"><div class="validation"></div></div>';
    }
    if (tip == 1) {
      document.getElementById('kat_id').innerHTML = "";
    }
  }
</script>

@endsection