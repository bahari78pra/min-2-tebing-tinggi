@extends('layouts.web.page_detail')
@section('kategori', 'Berita dan Pengumuman Terkini')
@section('breadcrumb', 'Berita dan Pengumuman Terkini')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 20px;">
                <h5>{{ $berita_detail->title }}</h5>
                <i style="margin-top: -10px !important">Oleh : Admin | Tanggal :
                    {{ date('d-m-Y', strtotime($berita_detail->created_at)) }}</i>
            </div>
        </div>
        <div class="row">
            @if ($berita_detail->image != null)
                <div class="col-lg-6 col-md-6 col-sm-12 mt-10">
                    <img src="{{ asset('images/' . $berita_detail->image) }}" alt="{{ $berita_detail->title }}"
                        class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 content">
                    {!! $berita_detail->detail !!}
                </div>
            @else
                <div class="col-lg-12 col-md-12 col-sm-12 content">
                    {!! $berita_detail->detail !!}
                </div>
            @endif
        </div>
    </div>

@endsection
