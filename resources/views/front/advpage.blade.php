@extends("front.layouts.master")
@section('title','İlan Ver')


@section('content')
<!--/ Intro Single star /-->
<section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single">İlan Sayfası</h1>
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
            <form class="form-a contactForm" action="{{route('ilankaydet')}}" method="POST" role="form" enctype="multipart/form-data">
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
                  <label>İlan Başlığı</label>
                  <input type="text" name="baslik" class="form-control form-control-lg form-control-a" placeholder="İlan Başlığını Giriniz" data-rule="minlen:3" data-msg="Lütfen başlık giriniz!">
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label>Fiyat</label>
                  <input type="text" name="fiyat" class="form-control form-control-lg form-control-a" placeholder="Fiyat" data-rule="minlen:1" data-msg="Lütfen Fiyat Giriniz!">
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="state">Kimden</label>
                  <select class="form-control form-control-lg form-control-a" id="kimden" name="kimden" data-msg="Lütfen seçim yapınız!">
                    <option value="0">Kimden</option>
                    @foreach($kimden as $k)
                    <option value="{{ $k->id }}">{{$k->kimden}}</option>
                    @endforeach
                  </select>
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="state">Durum</label>
                  <select class="form-control form-control-lg form-control-a" id="durum" name="durum" data-msg="Lütfen durum seçiniz!">
                    <option value="0">Durum Seçiniz</option>
                    @foreach($durum as $d)
                    <option value="{{ $d->id }}">{{$d->durum}}</option>
                    @endforeach
                  </select>
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="type">Tip</label>
                  <select class="form-control form-control-lg form-control-a" id="tip" name="tip" data-msg="Lütfen tip seçiniz!" onchange="tipSet()">
                    <option value="0">Tip Seçiniz</option>
                    @foreach($tipler as $tip)
                    <option value="{{ $tip->id }}">{{$tip->tip}}</option>
                    @endforeach
                  </select>
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label>Alan</label>
                  <input value="{{isset($_GET['alan']) ? $_GET['alan'] : ''}}" type="text" name="alan" class="form-control form-control-lg form-control-a" placeholder="Alan" data-rule="minlen:1" data-msg="Lütfen Alan Giriniz!">
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3" id="oda_id">
                <div class="form-group">
                  <label for="room">Oda Sayısı</label>
                  <select class="form-control form-control-lg form-control-a" id="oda_sayisi" name="oda_sayisi" data-msg="Lütfen oda sayısını seçiniz!">
                    <option value="0">Oda sayısını seçiniz</option>
                    @foreach($oda_sayisi as $od)
                    <option value="{{ $od->id }}">{{$od->oda_sayisi}}</option>
                    @endforeach
                  </select>
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3" id="isitma_id">
                <div class="form-group">
                  <label for="room">Isıtma türü</label>
                  <select class="form-control form-control-lg form-control-a" id="isitma_tur" name="isitma_tur" data-msg="Lütfen ısıtma türünü seçiniz!">
                    <option value="0">İsitma türünü seçiniz</option>
                    @foreach($isitma_tur as $it)
                    <option value="{{ $it->id }}">{{$it->isitma_tur}}</option>
                    @endforeach
                  </select>
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3" id="kat_id">
                <div class="form-group">
                  <label>Kat</label>
                  <input type="text" name="kat_sayisi" id="kat_sayisi" class="form-control form-control-lg form-control-a" placeholder="Kat Sayısı" data-rule="minlen:1" data-msg="Lütfen Kat Giriniz!">
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label>Resim Seç</label>
                  <input class="form-control form-control-lg form-control-a" type="file" id="resim" name="resim[]" multiple accept="image/png, image/jpeg, image/jpg">
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="floor">İl</label>
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
                  <label for="floor">İlçe</label>
                  <select class="form-control form-control-lg form-control-a" id="ilce" name="ilce" onchange="getIlceId()" data-msg="Lütfen ilçe seçiniz!">
                    <option value="0">İlçe seçiniz</option>
                  </select>
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="floor">Mahalle</label>
                  <select class="form-control form-control-lg form-control-a" id="mah" name="mah" data-msg="Lütfen mahalle seçiniz!">
                    <option value="0">Mahalle seçiniz</option>
                  </select>
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label>Adres</label>
                  <input type="text" name="adres" class="form-control form-control-lg form-control-a" placeholder="Adresinizi Giriniz" data-rule="minlen:3" data-msg="Adres giriniz!">
                  <div class="validation"></div>
                </div>
              </div>


              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label>Telefon</label>
                  <input type="text" name="tel" class="form-control form-control-lg form-control-a" placeholder="İlan Başlığını Giriniz" data-rule="minlen:11" data-msg="Telefon numarası giriniz!">
                  <div class="validation"></div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label>Açıklama</label>
                  <textarea name="aciklama" class="form-control" name="message" cols="45" rows="6" data-rule="required" data-msg="Lütfen açıklama giriniz!" placeholder="Açıklama"></textarea>
                  <div class="validation"></div>
                </div>
              </div>

              <button type="submit" class="btn btn-a">İlan Ver</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

</section>
<!--/ Contact End /-->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
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

  // function getValue(){
  //   var value = document.getElementById('durum').value;
  //   //document.getElementById('durum').submit();
  //   console.log(value);
  // }

  function setProperty() {

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