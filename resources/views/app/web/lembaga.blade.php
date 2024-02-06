@extends('layouts.web.page_detail')
@section('kategori', 'Lembaga')
@section('breadcrumb', $lembaga_detail->judul)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 20px;">
                <h5>{{ $lembaga_detail->judul }}</h5>
                <i style="margin-top: -10px !important">Oleh : Admin | Tanggal :
                    {{ date('d-m-Y', strtotime($lembaga_detail->created_at)) }}</i>
            </div>
        </div>
        <div class="row">
            @if ($lembaga_detail->gambar != null)
                <div class="col-lg-6 col-md-6 col-sm-12 mt-10">
                    <img src="{{ asset('images/' . $lembaga_detail->gambar) }}" alt="{{ $lembaga_detail->judul }}"
                        class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 content">
                    {!! $lembaga_detail->detail !!}
                </div>
            @else
                <div class="col-lg-12 col-md-12 col-sm-12 content">
                    {!! $lembaga_detail->detail !!}
                </div>
            @endif
        </div>
    </div>

@endsection
