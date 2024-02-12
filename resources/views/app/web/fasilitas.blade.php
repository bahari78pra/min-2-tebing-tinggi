@extends('layouts.web.page_detail')
@section('kategori', 'Fasilitas Madrasah')
@section('breadcrumb', $fasilitas_detail->judul)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 20px;">
                <h5>{{ $fasilitas_detail->judul }}</h5>
                <i style="margin-top: -10px !important">Oleh : Admin | Tanggal :
                    {{ date('d-m-Y', strtotime($fasilitas_detail->created_at)) }}</i>
            </div>
        </div>
        <div class="row content">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-10">
                @if ($fasilitas_detail->gambar != null)
                    <center>
                        <img src="{{ asset('images/' . $fasilitas_detail->gambar) }}" alt="{{ $fasilitas_detail->judul }}"
                            class="img-fluid img-thumbnail mb-3">
                    </center>
                @endif
                <p>
                    {!! $fasilitas_detail->detail !!}
                </p>
            </div>

        </div>
    </div>

@endsection
