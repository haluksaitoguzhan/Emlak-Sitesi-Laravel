@if(isset($tipler)==true || isset($durum)==true || isset($kimden)==true || isset($iller)==true)
<!--/ Form Search Star /-->
<div class="box-collapse">
  <div class="title-box-d">
    <h3 class="title-d">İlan Ara</h3>
  </div>
  <span class="close-box-collapse right-boxed ion-ios-close"></span>
  <div class="box-collapse-wrap form">
    <form class="form-a" action="{{route('ilanara')}}" method="POST">
      @csrf
      <div class="row">

        @if($errors->any())
        <div class="alert alert-danger d-flex justify-content-start">
          <script>
            var open = document.querySelector("body");
            open.classList.add("box-collapse-open")
          </script>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </div>
        @endif

        <!-- <div class="col-md-12 mb-2">
            <div class="form-group">
              <label for="Type">Anahtar kelime</label>
              <input type="text" id="key" name="key" class="form-control form-control-lg form-control-a" placeholder="Ara">
            </div>
          </div> -->

        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="Type">Tip</label>
            <select class="form-control form-control-lg form-control-a" id="tip" name="tip">
              <option value="0">Hepsi</option>
              @foreach($tipler as $tip)
              <option value="{{ $tip->id }}">{{$tip->tip}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="city">İl</label>
            <select class="form-control form-control-lg form-control-a" id="il" name="il" onchange="getIlId()">
              <option value="0">Hepsi</option>
              @foreach($iller as $il)
              <option value="{{ $il->id }}">{{$il->il}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="bedrooms">Kimden</label>
            <select class="form-control form-control-lg form-control-a" id="kimden" name="kimden">
              <option value="0" selected>Hepsi</option>
              @foreach($kimden as $kim)
              <option value="{{ $kim->id }}">{{$kim->kimden}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="garages">İlçe</label>
            <select class="form-control form-control-lg form-control-a" id="ilce" name="ilce" onchange="getIlceId()">
              <option value="0" selected>Hepsi</option>
            </select>
          </div>
        </div>

        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="bedrooms">Durum</label>
            <select class="form-control form-control-lg form-control-a" id="durum" name="durum">
              <option value="0" selected>Hepsi</option>
              @foreach($durum as $d)
              <option value="{{ $d->id }}">{{$d->durum}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <!-- <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="price">Minimum Bütçe</label>
              <select class="form-control form-control-lg form-control-a" id="fiyat" name="fiyat">
                <option value="0">Limitsiz</option>
                <option value="1">50,000 ₺</option>
                <option value="2">100,000 ₺</option>
                <option value="3">150,000 ₺</option>
                <option value="4">200,000 ₺</option>
              </select>
            </div>
          </div> -->

        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="bathrooms">Mahalle</label>
            <select class="form-control form-control-lg form-control-a" id="mah" name="mah">
              <option value="0">Hepsi</option>
            </select>
          </div>
        </div>

        <div class="col-md-12">
          <button type="submit" class="btn btn-b">Ara</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!--/ Form Search End /-->

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
</script>
@endif
