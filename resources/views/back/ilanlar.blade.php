@extends('back.layouts.master')
@section('title','Bekleyen İlanlar')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $ilanlar->count() }} ilan mevcut.</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Resim</th>
                        <th>Başlık</th>
                        <th>Konum</th>
                        <th>Tip</th>
                        <th>Durum</th>
                        <th>Kimden</th>
                        <th>Fiyat</th>
                        <th>Alan</th>
                        <th>Oda</th>
                        <th>Isıtma</th>
                        <th>Kat</th>
                        <th>İletişim</th>
                        <th>Açıklama</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>
                            <pre>         </pre>İncele
                        </th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ilanlar as $ilan)
                    <tr>
                        @if($ilan->resimler->first() != null)
                        <td>
                            <img src="{{ asset($ilan->resimler->first()->resim)}}" width="200" height="100">
                        </td>
                        @else
                        <td>
                            <i class="bi bi-x"><span>Resim yok</span></i>
                        </td>
                        @endif
                        <!-- <td>System Architect</td> -->
                        <td>{{ $ilan->baslik }}</td>
                        <td>{{ $ilan->adres }}</td>
                        <td>{{ $ilan->tipler->tip }}</td>
                        <td>{{ $ilan->durum->durum}}</td>
                        <td>{{ $ilan->kimden->kimden }}</td>
                        <td>{{ $ilan->fiyat }}</td>
                        <td>{{ $ilan->alan }}</td>
                        <td>@isset($ilan->oda->oda_sayisi) {{ $ilan->oda->oda_sayisi }} @else Boş @endif</td>
                        <td>@isset($ilan->isitmaTur->isitma_tur) {{ $ilan->isitmaTur->isitma_tur }} @else Boş @endif</td>
                        <td>@isset( $ilan->katSayisi) {{ $ilan->katSayisi }} @else Boş @endif</td>
                        <td>{{ $ilan->tel }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($ilan->aciklama,50,'...') }}</td>
                        <td>{{ $ilan->created_at }}</td>
                        <td>
                            <a href="{{ route('admin_ilan_detay',$ilan->id) }}" title="İncele" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> İncele </a>
                        </td>
                        <td>

                            @if(Request::segment(3) == 'bekleyen_ilanlar')
                            <a href="" title="Onayla" class="btn btn-sm btn-success" data-toggle="modal" data-target="#confirmModal-{{$ilan->id}}"><i class="fa fa-check"></i> </a>
                            <!-- Confirm Modal-->
                            <div class="modal fade" id="confirmModal-{{$ilan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Onayla!</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Bu ilanı onaylamak istediğinize emin misiniz?.</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
                                            @isset($ilan)
                                            <a class="btn btn-success" href="{{ route('admin_ilan_onayla',$ilan->id) }}">Onayla</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal end -->
                            @endif
                            <a href="" title="Sil" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal-{{$ilan->id}}"><i class="fa fa-trash"></i></a>
                            <!-- Delete Modal-->
                            <div class="modal fade" id="deleteModal-{{$ilan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Sil!</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Bu ilanı silmek istediğinize emin misiniz?.</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
                                            @isset($ilan)
                                            <a class="btn btn-danger" href="{{ route('admin_ilan_sil',$ilan->id) }}">Sil</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal end -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection