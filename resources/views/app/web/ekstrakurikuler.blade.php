@extends('layouts.web.page_detail')
@section('kategori', 'Ekstrakurikuler')
@section('breadcrumb', $ekskul_detail->judul)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 20px;">
                <h5>{{ $ekskul_detail->judul }}</h5>
                <i style="margin-top: -10px !important">Oleh : Admin | Tanggal :
                    {{ date('d-m-Y', strtotime($ekskul_detail->created_at)) }}</i>
            </div>
        </div>
        <div class="row content">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-10">
                @if ($ekskul_detail->gambar != null)
                    <center>
                        <img src="{{ asset('images/' . $ekskul_detail->gambar) }}" alt="{{ $ekskul_detail->judul }}"
                            class="img-fluid img-thumbnail mb-3">
                    </center>
                @endif
                <p>
                    {!! $ekskul_detail->detail !!}
                </p>
            </div>
        </div>
    </div>

@endsection
