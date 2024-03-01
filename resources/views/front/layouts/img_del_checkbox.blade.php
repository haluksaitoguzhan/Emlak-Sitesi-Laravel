@isset($ilan->resimler)
<label>Önceki Resimler | Silmek için işaretle:</label><br>
<div class="row">
    @foreach($ilan->resimler as $ilanresim)
    <div class="col-4">
        <div class="1st">
            <span><span>
                    <a class="dropdown-item">
                        <div class="form-check form-check-inline">
                        <label for="checkbox">
                        <input class="form-check-input" type="checkbox" name="img[]" value="{{ $ilanresim->id }}">
                        <div class="img-thumbnail rounded">
                        <img src="{{ asset($ilanresim->resim)}}"  width="180" height="110" alt="">
                        </label>
                        </div>
                        </div>
                    </a>
                </span></span>
        </div>
    </div>
    @endforeach
</div>

<!-- @foreach($ilan->resimler as $ilanresim) -->
<!-- Logout Modal-->
<!-- <div class="modal fade" id="imgDelModal-{{ $ilanresim->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-primary" href="{{ route('guncelle_post',$ilan->id) }}">Sil</a>
                </div>
            </div>
        </div>
    </div>
@endforeach -->

@endif