@isset($ilan->resimler)
<style>
    img {
        position: relative;
    }
</style>

<div class="row">
    
    @foreach($ilan->resimler as $ilanresim)
    <div class="col-4">
        <div class="1st">
            <span><span>
                    <a class="dropdown-item" data-toggle="modal" data-target="#imgDelModal-{{$ilanresim->id}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                    <img src="{{ asset($ilanresim->resim)}}" class="img-thumbnail rounded" width="200" alt="">
                    </a>
                </span></span>
        </div>
    </div>
    @endforeach
</div>

@foreach($ilan->resimler as $ilanresim)
<!-- Logout Modal-->
<div class="modal fade" id="imgDelModal-{{ $ilanresim->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sil!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Resmi silmek istediğinize emin misiniz?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
                    <a class="btn btn-primary" href="{{ route('resim_sil_post',$ilanresim->id) }}">Sil</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif

         <!-- Önceki resimler silinebilecek -->
                   <!-- <label>Önceki Resimler:</label><br/> -->
                    <!-- @include('front.layouts.img_del') <br/><br/> -->
                   
                  <!-- the end -->