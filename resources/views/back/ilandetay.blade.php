@extends('back.layouts.master')
@section('title','İlan Detayı')
@section('content')


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <!-- Slider Star -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($ilan->resimler as $ilanresim)
                @if($ilanresim->resim != null)
                <div class="carousel-item @if($ilan->resimler->first()->resim == $ilanresim->resim) active @endif">
                    <img class="d-block w-100" src="{{ asset($ilanresim->resim)}}" alt="{{ $ilanresim->resim }}" style="width: 250px; height: 550px">
                </div>
                @endif
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Önceki</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Sonraki</span>
            </a>
        </div>
        <!-- Slider end -->
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <!-- <thead> -->
                <!-- <tbody> -->
                <tr>
                    <th colspan="2">İlan Özellikleri</th>
                </tr>
                <tr>
                    <td><strong>Başlık</strong> </td>
                    <td>{{ $ilan->baslik }}</td>
                </tr>
                <tr>
                    <td><strong>Konum</strong> </td>
                    <td>{{$ilan->mahalle->mahalle}} / {{ $ilan->adres }}</td>
                </tr>
                <tr>
                    <td><strong>Tip</strong> </td>
                    <td>{{ $ilan->tipler->tip }}</td>
                </tr>
                <tr>
                    <td><strong>Durum</strong> </td>
                    <td>{{ $ilan->durum->durum}}</td>
                </tr>
                <tr>
                    <td><strong>Kimden</strong> </td>
                    <td>{{ $ilan->kimden->kimden }}</td>
                </tr>
                <tr>
                    <td><strong>Fiyat</strong> </td>
                    <td>{{ $ilan->fiyat }}</td>
                </tr>
                <tr>
                    <td><strong>Alan</strong> </td>
                    <td>{{ $ilan->alan }}</td>
                </tr>
                <tr>
                    <td><strong>Oda Sayısı</strong> </td>
                    <td>@isset($ilan->oda->oda_sayisi) {{ $ilan->oda->oda_sayisi }} @else Boş @endif</td>
                </tr>
                <tr>
                    <td><strong>Isıtma Türü</strong> </td>
                    <td>@isset($ilan->isitmaTur->isitma_tur) {{ $ilan->isitmaTur->isitma_tur }} @else Boş @endif</td>
                </tr>
                <tr>
                    <td><strong>Kat</strong> </td>
                    <td>@isset( $ilan->katSayisi) {{ $ilan->katSayisi }} @else Boş @endif</td>
                </tr>
                <tr>
                    <td><strong>İletişim</strong> </td>
                    <td>{{ $ilan->tel }}</td>
                </tr>
                <tr>
                    <td><strong>Oluşturulma Tarihi</strong> </td>
                    <td>{{ $ilan->created_at }}</td>
                </tr>
                <tr>
                    <td><strong>Açıklama</strong> </td>
                    <td>{{ $ilan->aciklama }}</td>
                </tr>
                <tr>
                    <th colspan="2">
                        @if(Request::segment(3) == 'ilan_detay' && $ilan->status == 0)
                        <a href="" title="Onayla" class="btn btn-sm btn-success" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-check"></i> ONAYLA </a>
                        <!-- Confirm Modal-->
                        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a href="" title="Sil" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i> SİL</a>
                        <!-- Delete Modal-->
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    </th>
                </tr>
                <!-- </tbody> -->
                <!-- </thead> -->
            </table>
        </div>
    </div>
</div>
@endsection